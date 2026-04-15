
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
                    <h3 class="card-label">Entrprise Report
                </div>

            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <form method="post"  action="{{url('report/export_entrp_report_result')}}"  >
                    {{csrf_field()}}
                    <input type="hidden" name="created_at" value="{{$created_at}}" />
                    <input type="hidden" name="end_created_at" value="{{$end_created_at}}" />
                    <input type="hidden" name="customer_name" value="{{$customer_name}}" />
                    <input type="hidden" name="bank_transaction_date" value="{{$bank_transaction_date}}" />
                    <input type="hidden" name="transaction_amount" value="{{$transaction_amount}}" />
                    <input type="hidden" name="ticket_num" value="{{$ticket_num}}" />
                    <input type="hidden" name="account" value="{{$account}}" />
                    <input type="hidden" name="transaction_type_id" value="{{$transaction_type_id}}" />
                    <input type="hidden" name="status" value="{{$status}}" />
                    <input type="hidden" name="add_on_oracle_date" value="{{$add_on_oracle_date}}" />
                    <input type="hidden" name="creator_name_id" value="{{$creator_name_id}}" />
                    <input type="submit" value="Export" name="Export"  class="btn btn-primary mr-2" />
                </form>
                <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <table id="#" class="table table-bordered table-striped">
                                    <thead>
                                        <tr  role="row" class="header-tr">
                                            <th>Ticket Number</th>
                                            <th>Ticket creation date</th>
                                            <th>Bank transaction date</th>
                                            <th>Bank Name</th>
                                            <th>Amount</th>
                                            <th>Account</th>
                                            <th>Total Amount</th>
                                            <th> Transaction Type </th>
                                            <th>Customer Name</th>
                                            <th>Ticket Status</th>
                                            <th>Pool</th>
                                            <th>Market Segment</th>
                                            <th>Cheque Number</th>
                                            <th>Added on Oracle Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tickets as$ticket)
                                        <tr>


                                            <td>{{$ticket->id}}</td>
                                            <td>{{date($ticket->created_at)}}</td>
                                            <td>{{date($ticket->bank_transaction_date)}}</td>
                                            <td>{{$ticket->bank->name}}</td>
                                            <td>{{$ticket->transaction_amount}}</td>

                                            <td>{{$ticket->account}}</td>

                                            <td class="text-center">


                                                @if($ticket->ticket_multiple_settlements->count()>0)
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{ $ticket->id }}">
                                                    show
                                                </button>
                                                @endif

                                                <div class="modal fade" id="exampleModal_{{ $ticket->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel_{{ $ticket->id }}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel_{{ $ticket->id }}">Total Amount ticket: <span style="color:red">{{$ticket->id}}</span></h5>
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">


                                                                <table class="table">
                                                                    <thead class="thead-dark">
                                                                        <tr >

                                                                            <th scope="col" style="color: white">ACCOUNT</th>
                                                                            <th scope="col" style="color: white">AMOUNT</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($ticket->ticket_multiple_settlements as $settle)
                                                                        <tr>

                                                                            <td>{{$settle->account}}</td>
                                                                            <td>{{$settle->amount}}</td>

                                                                        </tr>
                                                                        @endforeach


                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </td>

                                            <td>{{ $ticket->transaction_type ? $ticket->transaction_type->name : ""}}</td>
                                            <td>{{$ticket->customer_name}}</td>

                                            <td>{{ $ticket->status ? $ticket->status->name : ""}}</td>
                                            <td>{{$ticket->group ? $ticket->group->name : ""}}</td>
                                            <td> {{ $ticket->market_segment->name }} </td>
                                            <td> {{ $ticket->cheque_number }} </td>

                                            <td>{{ $ticket->add_on_oracle_date ? date('d-M-Y' , strtotime($ticket->add_on_oracle_date)) : ""}} </td>


                                        </tr>
                                        @endforeach


                                    </tbody>

                                </table>
                            </div>


                            <!--end: Datatable-->
                        </div>

                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->


            @endsection

            @push('script')

            <script>
                $(function () {
                    $("#example1").DataTable({
                        "responsive": false, "paging": false,
                        "lengthChange": false,
                        "searching": false, "info": false, "autoWidth": true, "ordering": false,
                        "buttons": ["csv", "excel", "pdf"]
                    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                    $('#example2').DataTable({
                        "paging": false,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": false,
                        "info": false,
                        "autoWidth": false,
                        "responsive": false,
                    });
                });
            </script>

            @endpush