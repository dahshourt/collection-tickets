
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
                        <h3 class="card-title">Collection Report</h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form name="add-blog-post-form" id="add-blog-post-form" method="get" action="{{url('report/entrp-report-result')}}">
                                               <div class="card-body">
                            <div class="form-group mb-8">
                                <div class="alert alert-custom alert-default" role="alert">
                                    <div class="alert-icon">
                                        <span class="svg-icon svg-icon-primary svg-icon-xl">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
                                                    <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Ticket creation date
                                <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" placeholder="Enter Customer Name" name="created_at" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Bank transaction date
                                <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" placeholder="Enter Customer Name" name="bank_transaction_date" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Amount
                                <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" placeholder="Enter Customer Name" name="transaction_amount" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Ticket Number
                                <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" placeholder="Enter Customer Name" name="ticket_num" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Customer Account
                                <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Customer Account" name="account" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleSelect1">Transaction Type
                                <span class="text-danger">*</span></label>
                                <select class="form-control" id="exampleSelect1" name="transaction_type_id ">


                                    <option value="">select Transaction Types</option>
                                  @foreach ($trans_types as $t_type )
                                <option value="{{$t_type->id}}">{{$t_type->name}}</option>
                                  @endforeach

                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Oracle field updated date
                                <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" placeholder="Enter Customer Name" name="add_on_oracle_date" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Customer Name
                                <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Customer Name" name="customer_name" />
                            </div>


                            <div class="form-group col-md-6">
                                <label for="exampleSelect1">Status
                                <span class="text-danger">*</span></label>
                                <select class="form-control" id="exampleSelect1" name="status">
                                <option value="">Select Status</option>

                                    @foreach ($statuses as $status )


                                    <option value="{{$status->id}}">{{$status->name}}</option>
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
                <!--begin::Card-->

                        </div>

                    </form>
                </div>
                <!--end::Card-->
                <!--begin::Card-->

            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
</div>


@endsection
