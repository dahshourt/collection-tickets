
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
                        <h3 class="card-title">CM Report</h3>
                        @if(Auth::user()->role == 1)
                        <button type="button" class="btn btn-warning float-right ml-2" onclick="showLogs('Report','CM Report')">
                            <i class="fa fa-history"></i> Logs
                        </button>
                        @endif
                    </div>
                    <!--begin::Form-->
                    <form name="add-blog-post-form" id="add-blog-post-form" method="get" action="{{url('report/report-result')}}">
                        <div class="card-body">
                            <div class="form-group col-md-6">
                                <label for="exampleSelect1">Users</label>
                                <select class="form-control" id="exampleSelect1" name="creator_id">
                                    <option value="">Select Users</option>
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->user_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Customer Name</label>
                                <input type="text" class="form-control" placeholder="Enter Customer Name" name="customer_name" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Customer Account</label>
                                <input type="text" class="form-control" placeholder="Enter Customer Account" name="account" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleSelect1">Market Segment</label>
                                <select class="form-control" id="exampleSelect1" name="market_segment_id">
                                    <option value="">Select Market Segment</option>
                                    @foreach ($market_segmets as $segment)
                                    <option value={{$segment->id}}>{{$segment->name}}</option>
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
                                <label for="exampleSelect1">Transaction Type</label>
                                <select class="form-control" id="exampleSelect1" name="transaction_type_id">
                                    <option value="">select Transaction Types</option>
                                    @foreach ($trans_types as $t_type)
                                    <option value="{{$t_type->id}}">{{$t_type->name}}</option>
                                    @endforeach
                                </select>
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
