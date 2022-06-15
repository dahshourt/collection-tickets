<?php

namespace App\Http\Controllers;
use  Session;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
//use App\Http\Requests\Reports\Api\ReportRequest;
use App\Factories\Reports\ReportFactory;
use App\Factories\Banks\BankFactory;
use App\Factories\Statuses\StatusFactory;

use App\Factories\Users\UserFactory;
use App\Factories\Groups\GroupFactory;
use App\Factories\Tickets\TicketsFactory;
use Auth;
use Illuminate\Http\Request;
use Excel;
use App\Exports\CMReportExport;
use App\Exports\EntrpReportExport;







class ReportController extends Controller
{
    use ValidatesRequests;
    private $Report;


    function __construct(ReportFactory $Report, UserFactory $User, GroupFactory $Group,BankFactory $Bank,StatusFactory $Status,TicketsFactory $Ticket ){

        $this->Report = $Report::index();
        $this->User=$User::index();
        $this->Group=$Group::index();
        $this->Bank=$Bank::index();
        $this->Status=$Status::index();
        $this->Ticket=$Ticket::index();



    }

    public function index()
    {
        $Reports = $this->Report->getAll();
        return "gg";
    }
public function cm_report()
{
   // dd(Auth::user());
    $users=$this->User->get_all_users();
    $groups=$this->Group->get_all_groups();
    $banks=$this->Bank->get_all_banks();
    $statuses=$this->Status->get_all_statuses();
    $market_segmets=$this->Ticket->get_all_market_segments();
    $trans_types=$this->Ticket->get_all_transaction_types();
  // dd($banks);
return view('reports.cm_report',compact('trans_types','market_segmets','users','groups','banks','statuses'));
}
public function report_result( Request $request)
{

    $creator_id = $request->input('creator_id');
    $customer_name = $request->input('customer_name');
    $account = $request->input('account');
    $market_segment_id = $request->input('market_segment_id');
    $bank = $request->input('receiver_bank_id');
    $transaction_type_id=  $request->input('transaction_type_id');
    $status = $request->input('status');
    $group_id = $request->input('status');
    $tickets=$this->Ticket->ticket_report($creator_id,$customer_name,$account,$market_segment_id,$bank,$transaction_type_id,$status,$group_id);
    $account=$request->input('account');

   return view('reports.report_result',compact('tickets'));

}

public function export_report()
{
$tickets=Session::get('cmreport');
//dd($tickets);
$data=array();
foreach($tickets as $ticket)
{

$data[]=array($ticket->creator->user_name,$ticket->customer_name,
$ticket->account,
$ticket->customer_type->name,
$ticket->market_segment->name,
$ticket->bank->name,
$ticket->transaction_type->name,
$ticket->status->name,
$ticket->group->name

);


}

return Excel::download(new CMReportExport($data), 'CM_Report.xlsx');


}
public function entp_report()
{
   // dd(Auth::user());
    $users=$this->User->get_all_users();
    $groups=$this->Group->get_all_groups();
    $banks=$this->Bank->get_all_banks();
    $statuses=$this->Status->get_all_statuses();
    $market_segmets=$this->Ticket->get_all_market_segments();
    $trans_types=$this->Ticket->get_all_transaction_types();
  // dd($banks);
return view('reports.entrp_report',compact('trans_types','market_segmets','users','groups','banks','statuses'));
}
public function entrp_report_result( Request $request)
{

    $created_at = $request->input('created_at');
    $customer_name = $request->input('customer_name');
    $bank_transaction_date = $request->input('bank_transaction_date');
    $transaction_amount = $request->input('transaction_amount');
    $ticket_num = $request->input('ticket_num');
    $account=$request->input('account');
    $transaction_type_id=  $request->input('transaction_type_id');
    $status = $request->input('status');
    $add_on_oracle_date = $request->input('add_on_oracle_date');
    $tickets=$this->Ticket->ticket_entrp_report
    ($created_at,$customer_name,$bank_transaction_date,$transaction_amount,
    $ticket_num,$account,$transaction_type_id,$status,$add_on_oracle_date);


   return view('reports.entrp_report_result',compact('tickets'));

}
public function export_entrp_report()
{
    $tickets=Session::get('entrpreport');
    //dd($tickets);
$data=array();
foreach($tickets as $ticket)
{

$data[]=array($ticket->created_at,$ticket->bank_transaction_date,
$ticket->transaction_amount,
$ticket->account,

$ticket->id,

$ticket->transaction_type->name,
$ticket->customer_name,

$ticket->status->name,

);


}

return Excel::download(new EntrpReportExport($data), 'Entrp_Report.xlsx');


}
public function collection_report()
{
   // dd(Auth::user());
    $users=$this->User->get_all_users();
    $groups=$this->Group->get_all_groups();
    $banks=$this->Bank->get_all_banks();
    $statuses=$this->Status->get_all_statuses();
    $market_segmets=$this->Ticket->get_all_market_segments();
    $trans_types=$this->Ticket->get_all_transaction_types();
  // dd($banks);
return view('reports.collection_report',compact('trans_types','market_segmets','users','groups','banks','statuses'));
}
public function cash_report()
{
   // dd(Auth::user());
    $users=$this->User->get_all_users();
    $groups=$this->Group->get_all_groups();
    $banks=$this->Bank->get_all_banks();
    $statuses=$this->Status->get_all_statuses();
    $market_segmets=$this->Ticket->get_all_market_segments();
    $trans_types=$this->Ticket->get_all_transaction_types();
  // dd($banks);
return view('reports.cash_report',compact('trans_types','market_segmets','users','groups','banks','statuses'));
}
public function cash_report_result( Request $request)
{

    $confirmation_date = $request->input('confirmation_date');
    $transaction_type_id = $request->input('transaction_type_id');
    $market_segment_id = $request->input('market_segment_id');
    $transaction_amount = $request->input('transaction_amount');
    $customer_name = $request->input('customer_name');
    $cheque_number = $request->input('cheque_number');
    $bank=$request->input('receiver_bank_id');
    $account=$request->input('account');
    $status = $request->input('status');
    $group_id=$request->input('group_id');

    $tickets=$this->Ticket->ticket_cash_report
    ($confirmation_date,$transaction_type_id,$market_segment_id,
    $transaction_amount,
    $customer_name,$cheque_number,$bank,$account,$status,$group_id);
//dd($tickets);

   return view('reports.cash_report_result',compact('tickets'));

}
}
