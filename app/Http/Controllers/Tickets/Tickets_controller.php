<?php

namespace App\Http\Controllers\Tickets;
use App\Http\Controllers\Controller;
use App\Factories\Tickets\TicketsFactory;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\Tickets\create_tickets;
use App\Http\Requests\Tickets\update_tickets;
use App\Http\Requests\test;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Rules\tickets\check_aggregate_of_transaction_amount;
use App\traits\store_files_trait;
use Illuminate\Support\Facades\Response;
 
class Tickets_controller extends Controller
{

    use store_files_trait;
    use ValidatesRequests;
    private $model;

    function __construct(TicketsFactory $TicketsFactory){
        $this->middleware('auth');
        $this->model = $TicketsFactory::index();
        $this->view = 'Tickets';
        $view = 'Tickets';
        $route = 'tickets';
        $title = 'Create Ticket';
        $form_title = 'tickets';
        view()->share(compact('view','route','title','form_title'));
        
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = $this->model->get_status();
        $market_segment = $this->model->get_all_market_segments();
        $receiver_banks = $this->model->get_all_receiver_banks();
        $transaction_types = $this->model->get_all_transaction_types();
        $get_all_customer_type = $this->model->get_all_customer_type();
        $groups = $this->model->get_group();
        $now = now();
         
        return view('tickets.create_ticket',compact(
            'status',
            'market_segment',
            'receiver_banks',
            'transaction_types',
            'get_all_customer_type',
            'groups',
            'now'
         ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(create_tickets $request)
    {
        
        $settlement_and_its_account = [] ;
        if($request->input('settlement'))
        {
             
            $settlement_and_its_account = array_combine($request->input('settlement'),  $request->input('account'));
            
            $validator = validator::make($request->all(), [ 'settlement' => [new check_aggregate_of_transaction_amount], 'account' => 'required' ]);
            if($validator->fails())
            {
                return back()->withInput($request->only('customer_name', 'cheque_number', 'group', 'customer_type', 'market_segment', 'status', 'transaction_type', 'transaction_amount', 'reciver_banck', 'banck_transaction_date', 'short_description','settlement'))->withErrors($validator);
            }
        }
       
       $files_path =  $this->upload_multible_files($request, '/uploads');
       $ticket_id =  $this->model->create_ticket($request);
       $this->model->add_files($ticket_id->id, $files_path);

        $this->model->ticket_multiple_settlements($ticket_id->id, $settlement_and_its_account);
        return redirect()->back()->with('status' , 'Created Successfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
       $title = "Update Ticket";
       $ticket_data = $this->model->get_ticket_data($id);
       $status = $this->model->get_status_workflow($ticket_data->id);
       $groups = $this->model->get_group_workflow($ticket_data->id);
    //    dd($this->model->get_group_workflow($ticket_data->id));
       $transaction_types = $this->model->get_all_transaction_types();
       $get_all_customer_type = $this->model->get_all_customer_type();
       $market_segment = $this->model->get_all_market_segments();
       $receiver_banks = $this->model->get_all_receiver_banks();

        return view('tickets.show_ticket', compact(
            'ticket_data',
            'title',
            'transaction_types',
            'get_all_customer_type',
            'market_segment',
            'receiver_banks',
            'status',
            'groups'

        ));
    }


    public function getDownload($id)
    {
        
        $get_files_for_download = $this->model->get_files_for_download($id);
       
        $file= public_path(). "/uploads/".$get_files_for_download[0]->file_path;
        $exten = $get_files_for_download[0]->file_path;
        $exten = explode('.', $exten);
        $headers = array(
                  'Content-Type: application/'.$exten[1],
                );
    
        return Response::download($file, $get_files_for_download[0]->file_path, $headers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(update_tickets $request, $id)
    {

        $settlement_and_its_account = [] ;
        if($request->input('settlement'))
        {
           // $settlement_and_its_account = array_combine($request->input('settlement'),  $request->input('account'));
              
            $validator = validator::make($request->all(), [ 'settlement' => [new check_aggregate_of_transaction_amount], 'account' => 'required' ]);
            if($validator->fails())
            {
                return back()->withInput($request->only('customer_name', 'cheque_number', 'group', 'customer_type', 'market_segment', 'status', 'transaction_type', 'transaction_amount', 'reciver_banck', 'banck_transaction_date', 'short_description'))->withErrors($validator);
            }
        }

        
		

        $ticket_id =  $this->model->update_ticket($request, $id);
        
        if($request->file_input)
        {
            $files_path =  $this->upload_multible_files($request, '/uploads');
            $this->model->add_files($id, $files_path);
        }
        $this->model->addToLogEntry($id, $request);
        $this->model->ticket_multiple_settlements_update($id, $request);
        return redirect()->back()->with('status' , 'Updated Successfully' );
        
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
