
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
                                    <input type="text" name="customer_name" value="{{$ticket_data->customer_name}}" class="form-control" id="exampleInputEmail1" placeholder="Customer Name " {{ $disabled }}>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Account number </label>
                                    <input type="text"  name="account" value="{{$ticket_data->account}}" class="form-control" id="exampleInputPassword1" placeholder="Account number" {{ $disabled }}>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Creator Group</label>
                                    <select name="creator_group_id" class="custom-select form-control-border" id="creator_group_id"  {{ $disabled }} >
                                        <option   value="{{$ticket_data->creator_group?$ticket_data->creator_group->id  : 0 }}">{{$ticket_data->creator_group ? $ticket_data->creator_group->name : "select"}}</option>
                                    </select>
                                </div>
                            </div>


                             <div class="col-md-6">
                                <div class="form-group" id="transaction">
                                    <label for="exampleSelectBorder">Transaction Type  </label>
                                    <select name="transaction_type_id" class="custom-select form-control-border" onchange="cheque_number()" id="transaction_type" {{ $disabled }}>
                                        <option value="">Select ....</option>
                                        @foreach($transaction_types as $value)
                                            <option {{$ticket_data->transaction_type_id ==  $value->id ? "selected" : ""}} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>


                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label  >Status   <span class="text-danger">*</span></label>
                                    <select  name="status_id" id="rejection_reason_id"  class="custom-select form-control-border" data-currentgroup="{{ $ticket_data->group_id }}" data-currentstatus="{{ $ticket_data->status_id }}" data-transaction="{{ $ticket_data->transaction_type_id }}" data-previousgroup="{{ $ticket_data->previous_group_id }}" data-transactiontype="{{ $ticket_data->transaction_type_id }}" {{ $disabled_status_group }}>

                                            @if(count($workflow->unique('transfer_status')) > 1)
                                            <option value="">Select ....</option>
                                            @endif
                                            @foreach($workflow->unique('transfer_status') as $value)
                                            <option {{$ticket_data->status_id ==  $value->status->id ? "selected" : ""}} value="{{$value->status->id}}">{{$value->status->name}}</option>
                                        @endforeach
                                     </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Group<span class="text-danger">*</span></label>
                                    <span id="status-group">
                                    <select name="group_id" class="custom-select form-control-border" {{ $disabled_status_group }}>
                                        @if(count($workflow->unique('transfer_status')) > 1)
                                            <option value="">Select ....</option>
                                        @else
                                            @foreach($workflow->unique('transfer_group') as $value)
                                                <option {{$ticket_data->group_id ==  $value->group->id ? "selected" : ""}}   value="{{$value->group->id}}">{{$value->group->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Customer Type  </label>
                                    <select @if($ticket_data->current_group[0]->id != 1 ) ? readonly : "" @endif name="customer_type_id" class="custom-select form-control-border" id="exampleSelectBorder" {{ $disabled }}>
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
                                    <select @if($ticket_data->current_group[0]->id != 1 ) ? readonly : "" @endif name="market_segment_id" class="custom-select form-control-border" id="exampleSelectBorder" {{ $disabled }}>
                                        <option value="">Select ....</option>
                                        @foreach($market_segment as $value)
                                            <option {{$ticket_data->market_segment_id ==  $value->id ? "selected" : ""}} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                             <div class="col-md-6 " style="display:none;"  id="dropdown_reason">
                                <div class="form-group" id="note_box">
                                    <label  >Rejection Reason   </label>
                                    <select name="rejection_reason_id" id="rejection_reason_value"    class="custom-select form-control-border" >
                                        <option value="">Select ....</option>
                                        @foreach($RejectionReasons as $row)

                                        <option  value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6" id="rejection_reason_comment" style="display:none">
                                <div class="form-group">
                                    <label  >Rejection Reason Comment</label>
                                    <textarea class="form-control"  name="rejection_reason_comment"   placeholder="Enter ..."></textarea>
                                </div>
                            </div>




                             @if($ticket_data->cheque_number)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Cheque Number</label>
                                            <input type="number" value="{{$ticket_data->cheque_number}}" name="cheque_number" placeholder="Cheque Number" class="form-control"
                                            {{ $disabled }}>
                                    </div>
                                </div>
                             @endif
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Receiver Bank  </label>
                                    <select name="receiver_bank_id" class="custom-select form-control-border" id="exampleSelectBorder" {{ $disabled }}>
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
                                    <input  type="text" id="datepicker" value="@if($ticket_data->bank_transaction_date > 0) {{date('d-M-Y' , strtotime($ticket_data->bank_transaction_date)) }} @else 0000-00-00 00:00:00 @endif"   name="bank_transaction_date" class="form-control"  {{ $disabled }}>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label for="exampleInputPassword1">Transaction Amount</label>
                                    <input type="text" value="{{$ticket_data->transaction_amount}}" name="transaction_amount" oninput="remove_error_message()" class="form-control  amount-formate" id="transaction_amount" pattern="[0-9.,]+" {{ $disabled }}>
                                    <a href='#!' onclick="add_settlement_fields()"   ><i class="fa fa-plus fa-border" aria-hidden="true"></i>  Settlement Amounts</a>
                                    <div class='row'>
                                        <div class="col-md-5" id='settlement_account'>
                                            @if($ticket_data->ticket_multiple_settlements)
                                                @foreach($ticket_data->ticket_multiple_settlements as $val)
                                                    <input @if($ticket_data->current_group[0]->id != 1 ) ? readonly : "" @endif type="text" value="{{$val->account}}"  name="settlement_accounts[]"  class="form-control" {{ $disabled }} placeholder="Account">
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="col-md-7" id='settlement'>
                                            @if($ticket_data->ticket_multiple_settlements)
                                                @foreach($ticket_data->ticket_multiple_settlements as $val)
                                                    <input @if($ticket_data->current_group[0]->id != 1 ) ? readonly : "" @endif type="text" value="{{$val->amount}}" readonly name="settlement[]"  class="form-control amount-formate"  placeholder="Amount">
                                                @endforeach
                                            @endif
                                        </div>

                                    </div>
                                    <span style="color:red" id="error_message"  ></span>
                                </div>
                            </div>
                            @if(($ticket_data->group_id == 8) || ($ticket_data->group_id == 1 && $ticket_data->add_on_oracle) || ($ticket_data->group_id == 10 && $ticket_data->add_on_oracle))

                            @php
                            $disabled = "";
                            if(($ticket_data->group_id == 1 || $ticket_data->group_id == 10) && $ticket_data->add_on_oracle) $disabled = "disabled";

                            @endphp

                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label>Added on Oracle ?</label>
                                    <div class="checkbox-list">
                                        <label class="checkbox">
                                            <input type="checkbox" name="add_on_oracle" {{ ($ticket_data->add_on_oracle) ? "checked" : ''}} value="1" {{ $disabled }}/>
                                            <span></span>
                                            Yes
                                        </label>

                                    </div>
                                </div>

                            </div>

                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label >Add on oracle date</label>
                                        <input type="date" value="{{ ($ticket_data->add_on_oracle_date) ? date("Y-m-d",strtotime($ticket_data->add_on_oracle_date)) : "" }}"   name="add_on_oracle_date" class="form-control" {{ $disabled }}>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea class="form-control"   name="description"   placeholder="Enter ..." {{ $disabled }} >{{$ticket_data->description}}</textarea>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Log Entry</label>
                                    <textarea class="form-control"  name="log_entry"   placeholder="Enter ..."{{ $disabled_status_group }}></textarea>
                                </div>
                            </div>
                            @if($ticket_data->group_id == 8 || $ticket_data->group_id == 1 || $ticket_data->group_id == 10 )
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>File input</label>
                                        <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="file_input[]" multiple   class="custom-file-input" {{ $disabled_status_group }}>
                                            <label class="custom-file-label"  >Choose file</label>
                                        </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-12">
                                    <div class="form-group">
                                         <a href="{{url('/tickets/ticket-logs/'.$ticket_data->id)}}">
                                            Ticket Logs</a></div>
</div>
                            </br>
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


                         <!-- /.card-body -->
                            @if($ticket_data->status_id !=9)
                            <div class="card-footer">
                                 <button type="submit"  class="btn btn-primary">Submit</button>
                            </div>
                            @endif

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
													@if($logs->user_id)
                                                    <span class="text-muted font-weight-bold">{{Auth::user()->find($logs->user_id)->user_name}}</span>
													@endif
                                                    <span class="text-muted font-weight-bold">{{$logs->created_at}}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                    </div>




                </form>
            </div>

@endsection

@push('script')
<script>

$('.amount-formate').keydown(function(e) {
  setTimeout(() => {
    if($(this).val()) {
        let parts = $(this).val().split(".");
        let v = parts[0].replace(/\D/g, ""),
          dec = parts[1]
        let calc_num = Number((dec !== undefined ? v + "." + dec : v));
        // use this for numeric calculations
        // console.log('number for calculations: ', calc_num);
        let n = new Intl.NumberFormat('en-EN').format(v);
        n = dec !== undefined ? n + "." + dec : n;
        $(this).val(n);
    }
  })
})

</script>
@endpush
