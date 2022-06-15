<?php

namespace App\Http\Repository\Tickets;
use App\Contracts\Tickets\TicketRepositoryInterface;
use App\Models\ticket;
use App\Models\Status;
use App\Models\transaction_type;
use App\Models\receiver_bank;
use App\Models\market_segment;
use App\Models\customer_type;
use App\Models\group;
use App\Models\ticket_attachment;
use App\Models\ticket_multiple_settlement;
use App\Models\workflow;
use App\Models\ticket_log_entry;
use Illuminate\Support\Facades\Auth;
use Session;

class TicketsRepository implements TicketRepositoryInterface
{


    public function get_status()
    {
        return Status::where('id', 1)->get();
    }
    public function get_status_of_create_ticket()
    {
        return Status::where('id', 1)->orwhere('id', 2)->get('id');
    }
    public function get_all_market_segments()
    {
        return market_segment::get()->all();
    }
    public function get_all_receiver_banks()
    {
        return receiver_bank::get()->all();
    }
    public function get_all_transaction_types()
    {
        return transaction_type::get()->all();
    }
    public function get_all_customer_type()
    {
        return customer_type::get()->all();
    }
    public function get_group()
    {

        return group::where('id','5')->orWhere('id' ,'3')->get();
    }
    public function get_group_of_create_ticket()
    {

        return group::where('id','5')->orWhere('id' ,'3')->get('id');
    }


    public function create_ticket($request)
    {

        return ticket::create([
            'customer_name' => $request->customer_name,
            'account' => $request->accounts,
            'creator_id' => Auth::user()->id,
            'user_action_id' => Auth::user()->id,
            'status_id' => $request->status,
            'group_id' => $request->group,
            'customer_type_id' => $request->customer_type,
            'market_segment_id' => $request->market_segment,
            'transaction_type_id' => $request->transaction_type,
            'receiver_bank_id' => $request->reciver_banck,
            'bank_transaction_date' => $request->banck_transaction_date,
            'transaction_amount' => $request->transaction_amount,
            'description' => $request->short_description,
            'cheque_number' => $request->cheque_number
        ]);

    }

    public function add_files($ticket_id, $files_path)
    {

       foreach($files_path as $value)
       {
            ticket_attachment::create([
                'ticket_id' => $ticket_id,
                'user_id' => Auth::user()->id,
                'file_path' => $value
            ]);
       }

    }

    public function ticket_multiple_settlements($ticket_id, $settlement_and_its_account)
    {
       foreach($settlement_and_its_account as $key => $value)
       {
        ticket_multiple_settlement::create([
                'ticket_id' => $ticket_id,
                'user_id' => Auth::user()->id,
                'account' => $value,
                'amount' => $key
            ]);
       }

    }
    public function get_ticket_data($id)
    {
        return ticket::where('id', $id)->with(['attachments','ticket_multiple_settlements'])->get()->first();
    }

    public function get_files_for_download($id)
    {
        return ticket_attachment::where('id', $id)->get();
    }


    public function get_status_workflow($current_group)
    {
        return workflow::where('current_group', $current_group)->with('to_status')->get();
    }

    public function get_group_workflow($current_group)
    {
        return workflow::where('current_group', $current_group)->with('to_group')->get();
    }

    public function update_ticket($request, $id)
    {
        return ticket::where('id', $id)->update([
            'customer_name' => $request->customer_name,
            'account' => $request->accounts,
            'user_action_id' => Auth::user()->id,
            'status_id' => $request->status,
            'group_id' => $request->group,
            'customer_type_id' => $request->customer_type,
            'market_segment_id' => $request->market_segment,
            'transaction_type_id' => $request->transaction_type,
            'receiver_bank_id' => $request->reciver_banck,
            'bank_transaction_date' => $request->banck_transaction_date,
            'transaction_amount' => $request->transaction_amount,
            'description' => $request->short_description,
            'cheque_number' => $request->cheque_number
        ]);
    }

    public function ticket_multiple_settlements_update($id, $request)
    {
        ticket_multiple_settlement::where('ticket_id', $id)->delete();
        if(isset($request->settlement))
        {
       foreach($request->settlement as $key => $value)
       {
        ticket_multiple_settlement::where('ticket_id', $id)->updateOrCreate([
                'ticket_id' => $id,
                'user_id' => Auth::user()->id,
                'account' => $request->account[$key],
                'amount' => $value
            ]);
           // dd( $value);
       }
    }

    }

    public function addToLogEntry($id,$request)
    {

        ticket_log_entry::Create([
                'ticket_id' => $id,
                'user_id' => Auth::user()->id,
                'comment' => $request->log_entry,

            ]);
    }


public function ticket_report($creator_id,$customer_name,$account,$market_segment_id,$bank,$transaction_type_id,$status,$group_id)
{
$ticket= ticket::with('creator','customer_type','market_segment','bank','transaction_type','status','group');
if(isset($creator_id))
{
    $ticket->where('creator_id',$creator_id);
}
if(isset($customer_name))
{
    $ticket->where('customer_name',$customer_name);
}
if(isset($account))
{
    $ticket->where('account',$account);

}
if(isset($market_segment_id))
{
    $ticket->where('market_segment_id',$market_segment_id);

}
if(isset($bank))
{
    $ticket->where('receiver_bank_id ',$bank);

}
if(isset($transaction_type_id))
{
    $ticket->where('transaction_type_id ',$transaction_type_id);
}
if(isset($status))
{
    $ticket->where('status_id',$status);

}
if(isset($group_id))
{
    $ticket->where('group_id',$group_id);

}
$tickets=$ticket->get();
Session::put('cmreport', $tickets);
return $tickets;

}
public function ticket_entrp_report($created_at
,$customer_name,$bank_transaction_date,$transaction_amount,
$ticket_num,$account,$transaction_type_id,$status,$add_on_oracle_date)
{
$ticket= ticket::with('status','transaction_type');
if(isset($created_at))
{
    $ticket->whereDate('created_at',date($created_at));
}
if(isset($customer_name))
{
    $ticket->where('customer_name',$customer_name);
}
if(isset($bank_transaction_date))
{
    $ticket->whereDate('bank_transaction_date',date($bank_transaction_date));
}
if(isset($account))
{
    $ticket->where('account',$account);

}
if(isset($transaction_amount))
{
    $ticket->where('transaction_amount',$transaction_amount);

}
if(isset($ticket_num))
{
    $ticket->where('id ',$ticket_num);

}
if(isset($transaction_type_id))
{
    $ticket->where('transaction_type_id ',$transaction_type_id);
}
if(isset($status))
{
    $ticket->where('status_id',$status);

}
if(isset($add_on_oracle_date))
{
    $ticket->whereDate('add_on_oracle_date',date($add_on_oracle_date));

}
$tickets=$ticket->get();
Session::put('entrpreport', $tickets);
return $tickets;

}
public function ticket_cash_report
    ($confirmation_date,$transaction_type_id,$market_segment_id,
    $transaction_amount,
    $customer_name,$cheque_number,$bank,$account,$status,$group_id)
    {
        $ticket= ticket::with('transaction_type','bank');
 if(isset($confirmation_date))
        {
            $ticket->whereDate('confirmation_date',date($confirmation_date));
        }
 if(isset($transaction_type_id))
          {
    $ticket->where('transaction_type_id ',$transaction_type_id);
      }
      if(isset($market_segment_id))
{
    $ticket->where('market_segment_id',$market_segment_id);

}
if(isset($customer_name))
{
    $ticket->where('customer_name',$customer_name);
}
if(isset($transaction_amount))
{
    $ticket->where('transaction_amount',$transaction_amount);

}


 if(isset($cheque_number))
 {

  $ticket->where('bank_transaction_date',($cheque_number));
 }
if(isset($bank))
{
    $ticket->where('receiver_bank_id ',$bank);

}
 if(isset($account))
 {
            $ticket->where('account',$account);


 }
        if(isset($status))
{
    $ticket->where('status_id',$status);

}
if(isset($group_id))
{
    $ticket->where('group_id',$group_id);

}
$tickets=$ticket->get();
Session::put('cashreport', $tickets);
return $tickets;
 }

}
