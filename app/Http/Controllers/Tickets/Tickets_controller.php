<?php

namespace App\Http\Controllers\Tickets;

use App\Http\Controllers\Controller;
use App\traits\LogsActivity;
use App\Models\ticket;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Auth;
use DB;

class Tickets_controller extends Controller
{
    use ValidatesRequests, LogsActivity;

    private $model;

    function __construct(\App\Factories\Tickets\TicketsFactory $Ticket)
    {
        $this->model = $Ticket::index();

        $view       = 'tickets';
        $route      = 'tickets';
        $title      = 'Tickets';
        $form_title = 'Ticket';
        view()->share(compact('view', 'route', 'title', 'form_title'));
    }

    // ─────────────────────────────────────────────────────────────────────────
    // INDEX — also handles search (searchCriteria in request)
    // ─────────────────────────────────────────────────────────────────────────

    public function index(Request $request)
    {
        $collection       = $this->model->index();
        $banks            = DB::table('receiver_banks')->select('id', 'name')->get();
        $groups           = DB::table('groups')->select('id', 'name')->get();
        $statuses         = DB::table('statuses')->select('id', 'name')->get();
        $marketSegments   = DB::table('market_segments')->select('id', 'name')->get();
        $customerTypes    = DB::table('customer_types')->select('id', 'name')->get();
        $transactionTypes = DB::table('transaction_types')->select('id', 'name')->get();
        $workflow         = $this->model->CashOperationWorkFlowStatus();

        // ── Log: Search vs plain View ────────────────────────────────────────
        if ($request->filled('searchCriteria')) {

            // Build a readable summary of every filter the user applied
            $filters = array();

            if ($request->filled('bank_name'))
                $filters[] = 'Bank: ' . $this->_ticketName('receiver_banks', $request->bank_name);
            if ($request->filled('pool'))
                $filters[] = 'Pool: ' . $this->_ticketName('groups', $request->pool);
            if ($request->filled('status'))
                $filters[] = 'Status: ' . $this->_ticketName('statuses', $request->status);
            if ($request->filled('market_segmant'))
                $filters[] = 'Market Segment: ' . $this->_ticketName('market_segments', $request->market_segmant);
            if ($request->filled('customer_type'))
                $filters[] = 'Customer Type: ' . $this->_ticketName('customer_types', $request->customer_type);
            if ($request->filled('transaction_type'))
                $filters[] = 'Transaction Type: ' . $this->_ticketName('transaction_types', $request->transaction_type);
            if ($request->filled('customerName'))
                $filters[] = 'Customer Name: ' . $request->customerName;
            if ($request->filled('accountNumber'))
                $filters[] = 'Account: ' . $request->accountNumber;
            if ($request->filled('chequeNumber'))
                $filters[] = 'Cheque No: ' . $request->chequeNumber;
            if ($request->filled('ticketNumber'))
                $filters[] = 'Ticket No: ' . $request->ticketNumber;

            $filterStr = !empty($filters) ? implode(' | ', $filters) : 'No filters applied';
            $resultCount = $collection->total();

            $this->writeLog(
                'Ticket',
                'Searched tickets | ' . $filterStr . ' | Results: ' . $resultCount,
                'Search',
                'Tickets'
            );

        } else {
            $this->writeLog('Ticket', 'Viewed tickets list', 'View', 'Tickets');
        }

        return view('tickets.index', compact(
            'collection', 'banks', 'groups', 'statuses',
            'marketSegments', 'customerTypes', 'transactionTypes', 'workflow'
        ));
    }

    // ─────────────────────────────────────────────────────────────────────────
    // MY TICKETS
    // ─────────────────────────────────────────────────────────────────────────

    public function myTickets()
    {
        $collection       = $this->model->listAllMyTickets(Auth::id());
        $banks            = DB::table('receiver_banks')->select('id', 'name')->get();
        $groups           = DB::table('groups')->select('id', 'name')->get();
        $statuses         = DB::table('statuses')->select('id', 'name')->get();
        $marketSegments   = DB::table('market_segments')->select('id', 'name')->get();
        $customerTypes    = DB::table('customer_types')->select('id', 'name')->get();
        $transactionTypes = DB::table('transaction_types')->select('id', 'name')->get();
        $workflow         = $this->model->CashOperationWorkFlowStatus();

        $this->writeLog(
            'Ticket',
            'Viewed My Tickets list | User: ' . Auth::user()->user_name,
            'View',
            'Tickets'
        );

        return view('tickets.index', compact(
            'collection', 'banks', 'groups', 'statuses',
            'marketSegments', 'customerTypes', 'transactionTypes', 'workflow'
        ));
    }

    // ─────────────────────────────────────────────────────────────────────────
    // CREATE
    // ─────────────────────────────────────────────────────────────────────────

    public function create()
    {
        $statuses          = $this->model->get_status();
        $groups            = $this->model->get_group();
        $market_segments   = $this->model->get_all_market_segments();
        $receiver_banks    = $this->model->get_all_receiver_banks();
        $transaction_types = $this->model->get_all_transaction_types();
        $customer_types    = $this->model->get_all_customer_type();

        return view('tickets.create', compact(
            'statuses', 'groups', 'market_segments',
            'receiver_banks', 'transaction_types', 'customer_types'
        ));
    }

    // ─────────────────────────────────────────────────────────────────────────
    // STORE — Create new ticket
    // ─────────────────────────────────────────────────────────────────────────

    public function store(Request $request)
    {
        $ticket = $this->model->create_ticket($request);

        // File attachments
        if ($request->hasFile('file_input')) {
            $files_path = array();
            foreach ($request->file('file_input') as $file) {
                $path = $file->store('ticket_attachments', 'public');
                $files_path[] = $path;
            }
            if (!empty($files_path)) {
                $this->model->add_files($ticket->id, $files_path);
            }
        }

        // Multiple settlements
        if ($request->has('settlement') && $request->settlement) {
            $this->model->ticket_multiple_settlements(
                $ticket->id,
                $request->settlement,
                $request->settlement_accounts
            );
        }

        $statusName  = $this->_ticketName('statuses',          $request->input('status_id'));
        $groupName   = $this->_ticketName('groups',            $request->input('group_id'));
        $txTypeName  = $this->_ticketName('transaction_types', $request->input('transaction_type_id'));
        $bankName    = $this->_ticketName('receiver_banks',    $request->input('receiver_bank_id'));
        $segmentName = $this->_ticketName('market_segments',   $request->input('market_segment_id'));

        $this->writeLog(
            'Ticket',
            'Created new ticket ID: ' . ($ticket ? $ticket->id : 'N/A')
                . ' | Customer: '         . $request->input('customer_name', 'N/A')
                . ' | Account: '          . $request->input('account', 'N/A')
                . ' | Amount: '           . $request->input('transaction_amount', 'N/A')
                . ' | Transaction Type: ' . $txTypeName
                . ' | Bank: '             . $bankName
                . ' | Status: '           . $statusName
                . ' | Group: '            . $groupName
                . ' | Market Segment: '   . $segmentName,
            'Create',
            'Tickets'
        );

        return redirect()->route('create_ticket')->with('status', 'Ticket Created Successfully');
    }

    // ─────────────────────────────────────────────────────────────────────────
    // SHOW — View single ticket details
    // ─────────────────────────────────────────────────────────────────────────

    public function show($id)
    {
        $ticket_data = $this->model->get_ticket_data($id);
        $workflow    = $this->model->getWorkflow(
            $ticket_data->group_id,
            $ticket_data->status_id,
            $ticket_data->previous_group_id
        );
        $rejection_reasons = $this->model->getRejectionReasons();

        $this->writeLog(
            'Ticket',
            'Viewed ticket ID: ' . $id
                . ' | Customer: '      . ($ticket_data->customer_name ?? 'N/A')
                . ' | Status: '        . $this->_ticketName('statuses', $ticket_data->status_id)
                . ' | Group: '         . $this->_ticketName('groups', $ticket_data->group_id),
            'View',
            'Tickets'
        );

        return view('tickets.show', compact('ticket_data', 'workflow', 'rejection_reasons'));
    }

    // ─────────────────────────────────────────────────────────────────────────
    // UPDATE — Update ticket fields, status, group, oracle date, rejection
    // ─────────────────────────────────────────────────────────────────────────

    public function update(Request $request, $id)
    {
        // Capture old values BEFORE update
        $old       = ticket::find($id);
        $oldStatus = $old ? $this->_ticketName('statuses', $old->status_id) : 'N/A';
        $oldGroup  = $old ? $this->_ticketName('groups',   $old->group_id)  : 'N/A';

        $this->model->update_ticket($request, $id);
        $this->model->ticket_multiple_settlements_update($id, $request);
        $this->model->addToLogEntry($id, $request);

        // File attachments
        if ($request->hasFile('file_input')) {
            $files_path = array();
            foreach ($request->file('file_input') as $file) {
                $path = $file->store('ticket_attachments', 'public');
                $files_path[] = $path;
            }
            if (!empty($files_path)) {
                $this->model->add_files($id, $files_path);
            }
        }

        // Build detailed change log comparing old vs new
        $newStatus = $this->_ticketName('statuses', $request->input('status_id'));
        $newGroup  = $this->_ticketName('groups',   $request->input('group_id'));
        $changes   = array();

        if ($old && (string)$old->status_id !== (string)$request->input('status_id'))
            $changes[] = 'Status: ' . $oldStatus . ' → ' . $newStatus;

        if ($old && (string)$old->group_id !== (string)$request->input('group_id'))
            $changes[] = 'Group: ' . $oldGroup . ' → ' . $newGroup;

        if ($old && (string)$old->transaction_amount !== (string)$request->input('transaction_amount'))
            $changes[] = 'Amount: ' . $old->transaction_amount . ' → ' . $request->input('transaction_amount');

        if ($old && $old->customer_name !== $request->input('customer_name'))
            $changes[] = 'Customer: ' . $old->customer_name . ' → ' . $request->input('customer_name');

        if ($old && $old->account !== $request->input('account'))
            $changes[] = 'Account: ' . $old->account . ' → ' . $request->input('account');

        if ($request->filled('add_on_oracle_date') && $old && $old->add_on_oracle_date !== $request->input('add_on_oracle_date'))
            $changes[] = 'Oracle Date: ' . ($old->add_on_oracle_date ?: 'N/A') . ' → ' . $request->input('add_on_oracle_date');

        if ($request->filled('rejection_reason_id')) {
            $reasonName = $this->_ticketName('rejection_reasons', $request->input('rejection_reason_id'));
            $changes[] = 'Rejected — Reason: ' . $reasonName;
        }

        if ($request->filled('log_entry'))
            $changes[] = 'Note added: ' . $request->input('log_entry');

        if ($request->hasFile('file_input'))
            $changes[] = 'Files uploaded: ' . count($request->file('file_input'));

        $detail = 'Updated ticket ID: ' . $id;
        if ($old) { $detail .= ' | Customer: ' . $old->customer_name; }
        if (!empty($changes)) { $detail .= ' | ' . implode(' | ', $changes); }
        else { $detail .= ' | No field changes detected'; }

        $this->writeLog('Ticket', $detail, 'Update', 'Tickets');

        return redirect()->back()->with('status', 'Updated Successfully');
    }

    // ─────────────────────────────────────────────────────────────────────────
    // BULK UPDATE — Change status for multiple tickets at once
    // ─────────────────────────────────────────────────────────────────────────

    public function BulkUpdate(Request $request)
    {
        $ticketIds  = $request->input('ticket_ids', array());
        $newStatusId = $request->input('status_id');

        foreach ($ticketIds as $id) {
            $this->model->updateBulk($id, array('status_id' => $newStatusId));
        }

        $statusName = $this->_ticketName('statuses', $newStatusId);

        $this->writeLog(
            'Ticket',
            'Bulk status update | New Status: ' . $statusName
                . ' | Total tickets: ' . count($ticketIds)
                . ' | Ticket IDs: ' . implode(', ', $ticketIds),
            'Update',
            'Tickets'
        );

        return redirect()->back()->with('status', 'Bulk Update Successfully');
    }

    // ─────────────────────────────────────────────────────────────────────────
    // EXPORT TICKETS — Export filtered ticket list to Excel
    // ─────────────────────────────────────────────────────────────────────────

    public function export_tickets(Request $request)
    {
        $tickets = $this->model->export_list_tickets();

        // Build readable filter summary
        $filters = array();
        if ($request->filled('bank_name'))
            $filters[] = 'Bank: ' . $this->_ticketName('receiver_banks', $request->bank_name);
        if ($request->filled('pool'))
            $filters[] = 'Pool: ' . $this->_ticketName('groups', $request->pool);
        if ($request->filled('status'))
            $filters[] = 'Status: ' . $this->_ticketName('statuses', $request->status);
        if ($request->filled('market_segmant'))
            $filters[] = 'Market Segment: ' . $this->_ticketName('market_segments', $request->market_segmant);
        if ($request->filled('customer_type'))
            $filters[] = 'Customer Type: ' . $this->_ticketName('customer_types', $request->customer_type);
        if ($request->filled('transaction_type'))
            $filters[] = 'Transaction Type: ' . $this->_ticketName('transaction_types', $request->transaction_type);
        if ($request->filled('customerName'))
            $filters[] = 'Customer Name: ' . $request->customerName;
        if ($request->filled('accountNumber'))
            $filters[] = 'Account: ' . $request->accountNumber;
        if ($request->filled('chequeNumber'))
            $filters[] = 'Cheque No: ' . $request->chequeNumber;
        if ($request->filled('ticketNumber'))
            $filters[] = 'Ticket No: ' . $request->ticketNumber;

        $filterStr = !empty($filters) ? implode(' | ', $filters) : 'No filters (all tickets)';

        $this->writeLog(
            'Ticket',
            'Exported ' . $tickets->count() . ' tickets to Excel | Filters: ' . $filterStr,
            'Export',
            'Tickets'
        );

        // Build Excel data
        $data = array();
        foreach ($tickets as $t) {
            $data[] = array(
                $t->id,
                $t->customer_name,
                $t->account,
                optional($t->customer_type)->name,
                optional($t->bank)->name,
                $t->transaction_amount,
                optional($t->market_segment)->name,
                optional($t->transaction_type)->name,
                optional($t->status)->name,
                optional($t->group)->name,
                $t->cheque_number,
                $t->created_at,
            );
        }

        return \Excel::download(new \App\Exports\CMReportExport($data), 'Tickets_Export.xlsx');
    }

    // ─────────────────────────────────────────────────────────────────────────
    // TICKET LOGS VIEW
    // ─────────────────────────────────────────────────────────────────────────

    public function ticket_logs($id)
    {
        
        $logs = $this->model->display_ticket_logs($id);
        $this->writeLog('Ticket', 'Viewed ticket log history for ticket ID: ' . $id, 'View', 'Tickets');
        return view('tickets.logs', compact('logs'));
    }

    // ─────────────────────────────────────────────────────────────────────────
    // WORKFLOW HELPERS — read-only AJAX (no log needed)
    // ─────────────────────────────────────────────────────────────────────────

    public function TransactionWorkflow(Request $request)
    {
        $workflow = $this->model->getTransferGroupStatus();
        return view('tickets.workflow_status_group', compact('workflow'));
    }

    public function WorkflowStatusGroup(Request $request)
    {
        $workflow = $this->model->getTransferGroup(
            $request->creator_group_id,
            $request->transfer_status,
            $request->current_group,
            $request->current_status,
            $request->previous_group_id,
            $request->transaction_type_id
        );
        return view('tickets.status_group', compact('workflow'));
    }

    // ─────────────────────────────────────────────────────────────────────────
    // DOWNLOAD ATTACHMENT
    // ─────────────────────────────────────────────────────────────────────────

    public function getDownload($id)
    {
        $file = $this->model->get_files_for_download($id)->first();

        $this->writeLog(
            'Ticket',
            'Downloaded file attachment (ID: ' . $id . ')' . ($file ? ' | File: ' . $file->file_path : ''),
            'View',
            'Tickets'
        );

        return response()->download(storage_path('app/public/' . $file->file_path));
    }

    // ─────────────────────────────────────────────────────────────────────────
    // PRIVATE — resolve ID to human-readable name from any DB table
    // ─────────────────────────────────────────────────────────────────────────

    private function _ticketName($table, $id)
    {
        if (empty($id)) return 'N/A';
        try {
            $row = DB::table($table)->select('name')->where('id', $id)->first();
            if ($row && isset($row->name)) {
                return $row->name . ' (ID: ' . $id . ')';
            }
        } catch (\Exception $e) {
            // silent fail — never crash the app because of logging
        }
        return (string)$id;
    }
}
