<?php

namespace App\Http\Controllers\Workflows;

use App\Http\Controllers\Controller;
use App\traits\LogsActivity;
use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Models\workflow;
use App\Models\Status;
use App\Models\group;
use App\Models\transaction_type;

use App\Http\Requests\Workflows\EditRequest;
use App\Http\Requests\Workflows\StoreRequest;
use Illuminate\Http\Request;
use DB;

class WorkflowController extends Controller
{
    use ValidatesRequests, LogsActivity;

    private $model;
    private $allowedUsers = [
        'walid.dahshour',
        'sara.mostafa',
        'Ahmed.O.Hasan',
        'ahmed.elfeel',
        'Mahmoud.bastawisy',
    ];

    function __construct()
    {
        $this->model = new workflow;
        $this->view  = 'workflows';
        $view        = 'workflows';
        $route       = 'workflows';
        $title       = 'workflows';
        $form_title  = 'Workflow';
        view()->share(compact('view', 'route', 'title', 'form_title'));
    }

    private function isAllowedUser()
    {
        $user = \Auth::user();
        return in_array($user->user_name, $this->allowedUsers);
    }

    // ─────────────────────────────────────────────────────────────────────────
    // INDEX
    // ─────────────────────────────────────────────────────────────────────────

    public function index()
    {
        $collection = $this->model->all();
        $this->writeLog('Workflow', 'Viewed workflow rules list', 'View', 'Workflow Management');
        return view("$this->view.index", compact('collection'));
    }

    // ─────────────────────────────────────────────────────────────────────────
    // CREATE
    // ─────────────────────────────────────────────────────────────────────────

    public function create()
    {
        $statuses          = Status::all();
        $groups            = group::all();
        $transaction_types = transaction_type::all();
        return view("$this->view.create", compact('statuses', 'groups', 'transaction_types'));
    }

    // ─────────────────────────────────────────────────────────────────────────
    // STORE
    // ─────────────────────────────────────────────────────────────────────────

    public function store(StoreRequest $request)
    {
        $this->model->create($request->except('_token'));

        // Resolve all IDs to names for a readable log
        $details = 'Created new workflow rule'
            . ' | Transaction Type: '  . $this->_wfName('transaction_types', $request->input('transaction_type_id'))
            . ' | Creator Group: '     . $this->_wfName('groups', $request->input('creator_group_id'))
            . ' | Current Group: '     . $this->_wfName('groups', $request->input('current_group'))
            . ' | Current Status: '    . $this->_wfName('statuses', $request->input('current_status'))
            . ' | Previous Group: '    . $this->_wfName('groups', $request->input('previous_group'))
            . ' | Transfer Group: '    . $this->_wfName('groups', $request->input('transfer_group'))
            . ' | Transfer Status: '   . $this->_wfName('statuses', $request->input('transfer_status'))
            . ' | Active: '            . ($request->input('active') ? 'Yes' : 'No');

        $this->writeLog('Workflow', $details, 'Create', 'Workflow Management');

        return redirect()->back()->with('status', 'Created Successfully');
    }

    // ─────────────────────────────────────────────────────────────────────────
    // SHOW
    // ─────────────────────────────────────────────────────────────────────────

    public function show($id)
    {
        $row  = $this->model->find($id);
        $show = 'disabled';
        $this->writeLog('Workflow', 'Viewed workflow rule ID: ' . $id, 'View', 'Workflow Management');
        return view("$this->view.show", compact('row', 'show'));
    }

    // ─────────────────────────────────────────────────────────────────────────
    // EDIT
    // ─────────────────────────────────────────────────────────────────────────

    public function edit($id)
    {
        $row               = $this->model->find($id);
        $statuses          = Status::all();
        $groups            = group::all();
        $transaction_types = transaction_type::all();
        $this->writeLog('Workflow', 'Opened edit form for workflow rule ID: ' . $id, 'View', 'Workflow Management');
        return view("$this->view.edit", compact('row', 'statuses', 'groups', 'transaction_types'));
    }

    // ─────────────────────────────────────────────────────────────────────────
    // UPDATE — logs every changed field with old and new values
    // ─────────────────────────────────────────────────────────────────────────

    public function update(EditRequest $request, $id)
    {
        // Capture old values BEFORE update
        $old = $this->model->find($id);

        $this->model->where('id', $id)->update($request->except('_token', '_method', 'id'));

        // Build a diff of what actually changed
        $changes = array();

        $fields = array(
            'transaction_type_id' => array('table' => 'transaction_types', 'label' => 'Transaction Type'),
            'creator_group_id'    => array('table' => 'groups',            'label' => 'Creator Group'),
            'current_group'       => array('table' => 'groups',            'label' => 'Current Group'),
            'current_status'      => array('table' => 'statuses',          'label' => 'Current Status'),
            'previous_group'      => array('table' => 'groups',            'label' => 'Previous Group'),
            'transfer_group'      => array('table' => 'groups',            'label' => 'Transfer Group'),
            'transfer_status'     => array('table' => 'statuses',          'label' => 'Transfer Status'),
            'active'              => array('table' => null,                 'label' => 'Active'),
        );

        foreach ($fields as $field => $meta) {
            $oldVal = $old ? $old->$field : null;
            $newVal = $request->input($field);

            if ((string)$oldVal === (string)$newVal) continue;

            if ($meta['table']) {
                $oldName = $this->_wfName($meta['table'], $oldVal);
                $newName = $this->_wfName($meta['table'], $newVal);
                $changes[] = $meta['label'] . ': ' . $oldName . ' → ' . $newName;
            } else {
                // Boolean field like 'active'
                $oldDisplay = $oldVal ? 'Yes' : 'No';
                $newDisplay = $newVal ? 'Yes' : 'No';
                $changes[] = $meta['label'] . ': ' . $oldDisplay . ' → ' . $newDisplay;
            }
        }

        if (!empty($changes)) {
            $details = 'Updated workflow rule ID: ' . $id . ' | ' . implode(' | ', $changes);
        } else {
            $details = 'Updated workflow rule ID: ' . $id . ' | No field changes detected';
        }

        $this->writeLog('Workflow', $details, 'Update', 'Workflow Management');

        return redirect()->back()->with('status', 'Updated Successfully');
    }

    // ─────────────────────────────────────────────────────────────────────────
    // DESTROY — logs full details of the deleted rule
    // ─────────────────────────────────────────────────────────────────────────

    public function destroy(Request $request, $id)
    {
        if (!$this->isAllowedUser()) {
            return redirect('/')->with('error', 'Unauthorized access');
        }

        if ($request->ajax()) {
            $workflow = $this->model->find($id);

            if ($workflow) {

                // Capture full details BEFORE deleting
                $details = 'Deleted workflow rule ID: ' . $id
                    . ' | Transaction Type: '  . $this->_wfName('transaction_types', $workflow->transaction_type_id)
                    . ' | Creator Group: '     . $this->_wfName('groups', $workflow->creator_group_id)
                    . ' | Current Group: '     . $this->_wfName('groups', $workflow->current_group)
                    . ' | Current Status: '    . $this->_wfName('statuses', $workflow->current_status)
                    . ' | Previous Group: '    . $this->_wfName('groups', $workflow->previous_group)
                    . ' | Transfer Group: '    . $this->_wfName('groups', $workflow->transfer_group)
                    . ' | Transfer Status: '   . $this->_wfName('statuses', $workflow->transfer_status)
                    . ' | Active: '            . ($workflow->active ? 'Yes' : 'No');

                $workflow->delete();

                $this->writeLog('Workflow', $details, 'Delete', 'Workflow Management');

                return response()->json(['msg' => 'Deleted successfully', 'status' => 'success']);

            } else {
                return response()->json(['msg' => 'Workflow not found', 'status' => 'failed']);
            }
        }

        return redirect()->route('workflows.index')->with('error', 'Invalid request');
    }

    // ─────────────────────────────────────────────────────────────────────────
    // PRIVATE HELPER — resolve ID to name from any table
    // ─────────────────────────────────────────────────────────────────────────

    private function _wfName($table, $id)
    {
        if ($id === null || $id === '') return 'N/A';
        try {
            $row = DB::table($table)->select('name')->where('id', $id)->first();
            if ($row && isset($row->name)) {
                return $row->name . ' (ID: ' . $id . ')';
            }
        } catch (\Exception $e) {
            // silent
        }
        return (string)$id;
    }
}
