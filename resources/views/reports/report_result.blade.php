
@extends('layouts.master')
@section('content')

<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Notice-->
       
        <!--end::Notice-->
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Report Result
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row">
                    <div class="col-sm-12">
                    <table class="table table-bordered table-checkable dataTable no-footer dtr-inline collapsed" id="kt_datatable" role="grid" aria-describedby="kt_datatable_info" style="width: 818px;">
                    <thead>
                        <tr role="row" class="header-tr">

                            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 61px;text-align:center" >
                                Creator Name
                            </th>
                            {{-- <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 59px;text-align:center" aria-label="Country: activate to sort column ascending">الكود</th> --}}
                            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 50px;text-align:center" aria-label="Ship City: activate to sort column ascending">Customer Name</th>
                            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 49px;" aria-label="Ship Date: activate to sort column ascending">Account</th>

                            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 49px;" aria-label="Ship Date: activate to sort column ascending">Customer Type</th>
                            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 49px;" aria-label="Ship Date: activate to sort column ascending">Market Segment</th>
                            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 49px;" aria-label="Ship Date: activate to sort column ascending">Bank Name</th>

                            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 49px;" aria-label="Ship Date: activate to sort column ascending">Transaction Type</th>
                            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 49px;" aria-label="Ship Date: activate to sort column ascending">Ticket Status</th>
                            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 49px;" aria-label="Ship Date: activate to sort column ascending">Pool</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as$ticket)
                        <tr>



                            <td>{{$ticket->creator? $ticket->creator->user_name : ""}}</td>
                            <td>{{$ticket->customer_name}}</td>
                            <td>{{$ticket->account}}</td>
                            <td>{{$ticket->customer_type ? $ticket->customer_type->name : ""}}</td>
                            <td>{{$ticket->market_segment ? $ticket->market_segment->name : ""}}</td>
                            <td>{{$ticket->bank? $ticket->bank->name : ""}}</td>
                            <td>{{$ticket->transaction_type ? $ticket->transaction_type->name : ""}}</td>
                            <td>{{ $ticket->status ? $ticket->status->name : ""}}</td>
                            <td>{{$ticket->group ? $ticket->group->name : ""}}</td>


                        </tr>
                        @endforeach

                    </tbody>


                </table>

                <!--end: Datatable-->
            </div>

        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->


@endsection
