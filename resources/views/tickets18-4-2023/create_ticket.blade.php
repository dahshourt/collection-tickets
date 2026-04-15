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
                                    <label for="exampleInputEmail1">Customer Name <span class="text-danger">*</span></label>
                                    <input type="text" name="customer_name" value="{{old('customer_name')}}" class="form-control" id="exampleInputEmail1" placeholder="Customer Name ">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Account number <span class="text-danger">*</span></label>
                                    <input type="text" name="account" value="{{old('account')}}" class="form-control" id="exampleInputPassword1" placeholder="Account number">
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Creator Group
									<span class="text-danger">*</span>
									</label>
                                    <select name="creator_group_id" class="custom-select form-control-border" id="creator_group_id">
										@if(count($creator_group_data) > 1)
                                        <option value="">Select ....</option>
										@endif
                                        @foreach($creator_group_data as $value)
                                           <option   value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
							
							 <div class="col-md-6" >
                                <div class="form-group" id="transaction">
                                    <label for="exampleSelectBorder">Transaction Type  <span class="text-danger">*</span></label>
                                    <select name="transaction_type_id" class="custom-select form-control-border" id="transaction_type">
                                        <option value="">Select ....</option>
                                        @foreach($transaction_types as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
							<span id="workflow-group-status" class="col-md-12">
							<div class="col-md-6" style="float:right">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Group<span class="text-danger">*</span></label>
                                    <select name="group_id" class="custom-select form-control-border" >
                                        <option value="">Select ....</option>
										
                                    </select>
                                </div>
                            </div>
							<div class="col-md-6" style="margin-left: -13px;">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Status   <span class="text-danger">*</span></label>
                                    <select name="status_id" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="">Select ....</option>
									</select>
                                </div>
                            </div>
                            </span>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Customer Type  <span class="text-danger">*</span></label>
                                    <select name="customer_type_id" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="">Select ....</option>
                                        @foreach($get_all_customer_type as $value)
                                        <option {{old('customer_type_id') ==  $value->id ? "selected" : ""}} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Market Segment  <span class="text-danger">*</span> </label>
                                    <select name="market_segment_id" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="">Select ....</option>
                                        @foreach($market_segment as $value)
                                            <option {{old('market_segment_id') ==  $value->id ? "selected" : ""}} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                           
                            
							 <div class="col-md-6" id="cheque_number" style="display:none">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Cheque Number</label>
                                            <input type="number" value="{{old('cheque_number')}}" name="cheque_number" placeholder="Cheque Number" class="form-control">
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Receiver Bank  <span class="text-danger">*</span></label>
                                    <select name="receiver_bank_id" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="">Select ....</option>
                                        @foreach($receiver_banks as $value)
                                            <option {{old('receiver_bank_id') ==  $value->id ? "selected" : ""}} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Bank transaction Date <span class="text-danger">*</span></label>
                                    <input type="text" value="@if(old('bank_transaction_date')){{date('Y-m-d', strtotime(old('bank_transaction_date')))}}@endif" id="datepicker"   name="bank_transaction_date" class="form-control"  >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label for="exampleInputPassword1">Transaction Amount
									<span class="text-danger">*</span></label>
                                    <input type="text" value="{{old('transaction_amount')}}" name="transaction_amount" oninput="remove_error_message()" class="form-control amount-formate" id="transaction_amount" pattern="[0-9.,]+">
                                    <a href='#!' onclick="add_new_settlement_fields()"><i class="fa fa-plus fa-border" aria-hidden="true"></i>  Settlement Amounts</a> 
                                        <div id="settlement_fields">

                                        </div>
                                        <div class='row'>
										
										<div class="col-md-5" id='settlement_account'>
                                            @if(old('settlement_accounts'))
                                                @foreach(old('settlement_accounts') as $val)
                                                    <input type="text" value="{{$val}}"  name="settlement_accounts[]"  class="form-control" placeholder="Account">
                                                @endforeach
                                            @endif
                                        </div>
										
										<div class="col-md-7" id='settlement'>
                                            @if(old('settlement'))
                                                @foreach(old('settlement') as $val)
                                                    <input type="text" value="{{$val}}"  name="settlement[]"  class="form-control amount-formate" placeholder="Amount">
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
                                    <textarea class="form-control"  name="description"   placeholder="Enter ...">{{old('description')}}</textarea>
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