
@extends('layouts.master')
@section('content')
 
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Fill Inputs</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form action="{{url('tickets/store_ticket')}}" method="post"  enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Customer Name </label>
                                    <input type="text" name="customer_name" value="{{old('customer_name')}}" class="form-control" id="exampleInputEmail1" placeholder="Customer Name ">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Account </label>
                                    <input type="text" name="accounts" value="{{old('accounts')}}" class="form-control" id="exampleInputPassword1" placeholder="Account">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Group</label>
                                    <select name="group" class="custom-select form-control-border" >
                                        <option value="">Select ....</option>
                                        @foreach($groups as $value)
                                           <option   value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Customer Type  </label>
                                    <select name="customer_type" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="">Select ....</option>
                                        @foreach($get_all_customer_type as $value)
                                        <option {{old('customer_type') ==  $value->id ? "selected" : ""}} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Market Segment   </label>
                                    <select name="market_segment" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="">Select ....</option>
                                        @foreach($market_segment as $value)
                                            <option {{old('market_segment') ==  $value->id ? "selected" : ""}} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Status   </label>
                                    <select name="status" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="">Select ....</option>
                                        @foreach($status as $value)
                                            <option {{old('status')  ==  $value->id ? "selected" : ""}} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="transaction">
                                    <label for="exampleSelectBorder">Transaction Type  </label>
                                    <select name="transaction_type" class="custom-select form-control-border" oninput="create_cheque_number()" id="transaction_type">
                                        <option value="">Select ....</option>
                                        @foreach($transaction_types as $value)
                                            <option {{old('transaction_type') ==  $value->id ? "selected" : ""}} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if(old('cheque_number'))
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Cheque Number</label>
                                            <input type="number" value="{{old('cheque_number')}}" name="cheque_number" placeholder="Cheque Number" class="form-control">
                                    </div>
                                </div>
                             @endif
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Receiver Bank  </label>
                                    <select name="reciver_banck" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="">Select ....</option>
                                        @foreach($receiver_banks as $value)
                                            <option {{old('reciver_banck') ==  $value->id ? "selected" : ""}} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Bank transaction Date </label>
                                    <input type="date" value="@if(old('banck_transaction_date')){{date('Y-m-d', strtotime(old('banck_transaction_date')))}}@endif"   name="banck_transaction_date" class="form-control"  >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label for="exampleInputPassword1">Transaction Amount</label>
                                    <input type="text" value="{{old('transaction_amount')}}" name="transaction_amount" oninput="remove_error_message()" class="form-control" id="transaction_amount" >
                                    <a href='#!' onclick="add_new_settlement_fields()"><i class="fa fa-plus fa-border" aria-hidden="true"></i>  Settlement Amounts</a> 
                                        <div id="settlement_fields">

                                        </div>
                                        <div class='row'><div class="col-md-7" id='settlement'>
                                            @if(old('settlement'))
                                                @foreach(old('settlement') as $val)
                                                    <input type="text" value="{{$val}}"  name="settlement[]"  class="form-control" >
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="col-md-5" id='settlement_account'>
                                            @if(old('account'))
                                                @foreach(old('account') as $val)
                                                    <input type="text" value="{{$val}}"  name="account[]"  class="form-control" >
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <span style="color:red" id="error_message"  ></span>
                                </div>
                            </div>
                             
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label  >Short Description</label>
                                    <textarea class="form-control"  name="short_description"   placeholder="Enter ...">{{old('short_description')}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="file_input[]" multiple   class="custom-file-input" >
                                    <label class="custom-file-label"  >Choose file</label>
                                </div>
                                
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                         <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
			 
@endsection	                