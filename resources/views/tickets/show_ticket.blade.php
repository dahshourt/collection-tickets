
@extends('layouts.master')
@section('content')
  
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Fill Inputs</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form action="{{url("tickets/update_ticket/$ticket_data->id")}}" method="post"  enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Customer Name </label>
                                    <input type="text" @if($ticket_data->current_group[0]->id != 1 ) ? readonly : "" @endif name="customer_name" value="{{$ticket_data->customer_name}}" class="form-control" id="exampleInputEmail1" placeholder="Customer Name ">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Account </label>
                                    <input type="text" @if($ticket_data->current_group[0]->id != 1 ) ? readonly : "" @endif name="accounts" value="{{$ticket_data->account}}" class="form-control" id="exampleInputPassword1" placeholder="Account">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Group</label>
                                    <select name="group" class="custom-select form-control-border" >
                                        <option value="{{$ticket_data->current_group[0]->id}}">{{$ticket_data->current_group[0]->name}}</option>
                                        @foreach($groups as $value)
                                           <option value="{{$value->to_group[0]->id}}">{{$value->to_group[0]->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Customer Type  </label>
                                    <select @if($ticket_data->current_group[0]->id != 1 ) ? readonly : "" @endif name="customer_type" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="">Select ....</option>
                                        @foreach($get_all_customer_type as $value)
                                        <option {{$ticket_data->customer_type_id ==  $value->id ? "selected" : ""}} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Market Segment   </label>
                                    <select @if($ticket_data->current_group[0]->id != 1 ) ? readonly : "" @endif name="market_segment" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="">Select ....</option>
                                        @foreach($market_segment as $value)
                                            <option {{$ticket_data->market_segment_id ==  $value->id ? "selected" : ""}} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label  >Status   </label>
                                    <select  name="status"  oninput="rejection_reasons()" id="rejection_reason_id"  class="custom-select form-control-border" >
                                        <option value="{{$ticket_data->current_status[0]->id}}">{{$ticket_data->current_status[0]->name}}</option>
                                            @foreach($status as $value)
                                                <option  value="{{$value->to_status[0]->id}}">{{$value->to_status[0]->name}}</option>
                                            @endforeach
                                     </select>
                                </div>
                            </div>
 

                             <div class="col-md-6 " style="display:none;"  id="dropdown_reason">
                                <div class="form-group" id="note_box">
                                    <label  >Rejection Reason   </label>
                                    <select @if($ticket_data->current_group[0]->id != 1 ) ? readonly : "" @endif name="rejection_reason" id="rejection_reason_value"  oninput="text_box_rejection_reasons()"  class="custom-select form-control-border" >
                                        <option value="">Select ....</option>
                                        <option  value="1">wrong bank</option>
                                        <option  value="2">wrong date.</option>
                                        <option  value="3">wrong amount</option>
                                        <option  value="4">Other</option>
                                    </select>
                                </div>
                            </div>

                             

                            <div class="col-md-6">
                                <div class="form-group" id="transaction">
                                    <label for="exampleSelectBorder">Transaction Type  </label>
                                    <select @if($ticket_data->current_group[0]->id != 1 ) ? readonly : "" @endif name="transaction_type" class="custom-select form-control-border" onchange="cheque_number()" id="transaction_type">
                                        <option value="">Select ....</option>
                                        @foreach($transaction_types as $value)
                                            <option {{$ticket_data->transaction_type_id ==  $value->id ? "selected" : ""}} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                     
                                   
                                </div>
                            </div>
                             @if($ticket_data->cheque_number)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Cheque Number</label>
                                            <input type="number" value="{{$ticket_data->cheque_number}}" name="cheque_number" placeholder="Cheque Number" class="form-control">
                                    </div>
                                </div>
                             @endif
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Receiver Bank  </label>
                                    <select @if($ticket_data->current_group[0]->id != 1 ) ? readonly : "" @endif name="reciver_banck" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="">Select ....</option>
                                        @foreach($receiver_banks as $value)
                                            <option {{$ticket_data->receiver_bank_id ==  $value->id ? "selected" : ""}} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Bank transaction Date </label>
                                    <input @if($ticket_data->current_group[0]->id != 1 ) ? readonly : "" @endif type="date" value="{{date('Y-m-d', strtotime($ticket_data->bank_transaction_date))}}"   name="banck_transaction_date" class="form-control"  >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label for="exampleInputPassword1">Transaction Amount</label>
                                    <input @if($ticket_data->current_group[0]->id != 1 ) ? readonly : "" @endif type="text" value="{{$ticket_data->transaction_amount}}" name="transaction_amount" oninput="remove_error_message()" class="form-control" id="transaction_amount" >
                                    <a href='#!' onclick="add_settlement_fields()"   ><i class="fa fa-plus fa-border" aria-hidden="true"></i>  Settlement Amounts</a> 
                                    <div class='row'>
                                        <div class="col-md-7" id='settlement'>
                                            @if($ticket_data->ticket_multiple_settlements)
                                                @foreach($ticket_data->ticket_multiple_settlements as $val)
                                                    <input @if($ticket_data->current_group[0]->id != 1 ) ? readonly : "" @endif type="text" value="{{$val->amount}}"  name="settlement[]"  class="form-control" >
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="col-md-5" id='settlement_account'>
                                            @if($ticket_data->ticket_multiple_settlements)
                                                @foreach($ticket_data->ticket_multiple_settlements as $val)
                                                    <input @if($ticket_data->current_group[0]->id != 1 ) ? readonly : "" @endif type="text" value="{{$val->account}}"  name="account[]"  class="form-control" >
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <span style="color:red" id="error_message"  ></span>
                                </div>
                            </div>
                             
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea class="form-control" @if($ticket_data->current_group[0]->id != 1 ) ? readonly : "" @endif  name="short_description"   placeholder="Enter ...">{{$ticket_data->description}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Log Entry</label>
                                    <textarea class="form-control"  name="log_entry"   placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                            @if($ticket_data->current_group[0]->id == 6 )
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>File input</label>
                                        <div class="input-group">
                                        <div class="custom-file">
                                            <input @if($ticket_data->current_group[0]->id != 1 ) ? readonly : "" @endif type="file" name="file_input[]" multiple   class="custom-file-input" >
                                            <label class="custom-file-label"  >Choose file</label>
                                        </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($ticket_data->attachments)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Download Files</label>
                                        <div class="input-group">
                                            <ul>
                                                @foreach($ticket_data->attachments as $file_path)
                                                   <li><a href="{{url("tickets/download_file/$file_path->id")}}" >{{$file_path->file_path}}</a></li> 
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                         
                            @if($ticket_data->ticket_log_entries)
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Log Entries</h3>
                                        <div class="card-toolbar">
                                            
                                        </div>
                                    </div>
                                    <div class="card-body pt-2">
                                        @foreach($ticket_data->ticket_log_entries as $key => $logs)
                                            <div class="d-flex align-items-center mt-10">
                                                <span class="bullet bullet-bar bg-primary align-self-stretch"></span>
                                                <label class="checkbox checkbox-lg checkbox-light-primary checkbox-inline flex-shrink-0 m-0 mx-4">
                                                </label>
                                                <div class="d-flex flex-column flex-grow-1">
                                                    <a href="#!" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1"> {{$logs->comment}}</a>
                                                    <span class="text-muted font-weight-bold">{{Auth::user()->find($logs->user_id)->user_name}}</span>
                                                    <span class="text-muted font-weight-bold">{{$logs->created_at}}</span>
                                                </div> 
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                    </div>
                    

                    
                    <!-- /.card-body -->
                    <div class="card-footer">
                         <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
			 
@endsection	                