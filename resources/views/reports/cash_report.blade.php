
@extends('layouts.master')
@section('content')

<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">Cash Report</h3>
                        @if(Auth::user()->role == 1)
                        <button type="button" class="btn btn-warning float-right ml-2" onclick="showLogs('Report','Cash Report')">
                            <i class="fa fa-history"></i> Logs
                        </button>
                        @endif
                    </div>
                    <!--begin::Form-->
                    <form name="add-blog-post-form" id="add-blog-post-form" method="get" action="{{url('report/cash-report-result')}}">
                        <div class="card-body">
                            <div class="form-group col-md-6">
                                <label>Added on Oracle Date</label>
                                <input type="date" class="form-control" placeholder="Enter Added on Oracle Date" name="confirmation_date" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleSelect1">Transaction Type</label>
                                <select class="form-control" id="exampleSelect1" name="transaction_type_id">
                                    <option value="">select Transaction Types</option>
                                    @foreach ($trans_types as $t_type)
                                    <option value="{{$t_type->id}}">{{$t_type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleSelect1">Bank</label>
                                <select class="form-control" id="exampleSelect1" name="receiver_bank_id">
                                    <option value="">Select Bank</option>
                                    @foreach($banks as $bank)
                                    <option value="{{$bank->id}}">{{$bank->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Amount</label>
                                <input type="text" class="form-control amount-formate" placeholder="Enter Amount" name="transaction_amount" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Customer Name</label>
                                <input type="text" class="form-control" placeholder="Enter Customer Name" name="customer_name" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Cheque Number</label>
                                <input type="text" class="form-control" placeholder="Enter Cheque Number" name="cheque_number" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Customer Account</label>
                                <input type="text" class="form-control" placeholder="Enter Customer Account" name="account" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleSelect1">Status</label>
                                <select class="form-control" id="exampleSelect1" name="status">
                                    <option value="">Select Status</option>
                                    @foreach ($statuses as $status)
                                    <option value="{{$status->id}}">{{$status->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleSelect1">Groups</label>
                                <select class="form-control" id="exampleSelect1" name="group_id">
                                    <option value="">Select Group</option>
                                    @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>

{{-- Logs Modal --}}
@include('partials.logs_modal')

@endsection

@push('script')
<script>
$('.amount-formate').keydown(function(e) {
    setTimeout(() => {
        if($(this).val()) {
            let parts = $(this).val().split(".");
            let v = parts[0].replace(/\D/g, ""),
                dec = parts[1];
            let n = new Intl.NumberFormat('en-EN').format(v);
            n = dec !== undefined ? n + "." + dec : n;
            $(this).val(n);
        }
    });
});
</script>
@endpush
