@extends('layouts.master') 
@section('content')
 
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Tickets
                            <span class="d-block text-muted pt-2 font-size-sm">List All Tickets</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">

                        <!--begin::Button-->

                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                        
                    <form method="get"  action="{{ url('tickets/search') }}" > 
                        
                        <div class="form-group m-form__group ">
                        <h2>Search Criteria</h2>
                            <div class="row">
                            
                                <div class="col-3">
                                <label >Bank Name</label>
                                     <select name="bank_name" class="form-control m-input">
                                        <option value="">select...</option>
                                        @foreach($banks as $bank)
                                            <option value="{{$bank->id}}">{{$bank->name}}</option>
                                        @endforeach
                                     </select>
                                </div>
                                <div class="col-3">
                                <label >Pool</label>
                                     <select name="pool" class="form-control m-input">
                                        <option value="">select...</option>
                                        @foreach($groups as $group)
                                            <option value="{{$group->id}}">{{$group->name}}</option>
                                         @endforeach
                                     </select>
                                </div>
                                <div class="col-3">
                                <label >Status</label>
                                     <select name="status" class="form-control m-input">
                                        <option value="">select...</option>
                                        @foreach($statuses as $status)
                                            <option value="{{$status->id}}">{{$status->name}}</option>
                                         @endforeach
                                     </select>
                                </div>
                                
                                <div class="col-3">
                                    <label >market segment</label>
                                     <select name="market_segmant" class="form-control m-input">
                                        <option value="">select...</option>
                                        @foreach($marketSegments as $marketSegment)
                                            <option value="{{$marketSegment->id}}">{{$marketSegment->name}}</option>
                                         @endforeach
                                     </select>
                                </div>
                                
                                <div class="col-3">
                                    <label >customer type</label>
                                     <select name="customer_type" class="form-control m-input">
                                        <option value="">select...</option>
                                        @foreach($customerTypes as $customerType)
                                            <option value="{{$customerType->id}}">{{$customerType->name}}</option>
                                         @endforeach
                                     </select>
                                </div>
                                
                                <div class="col-3">
                                    <label >transaction type</label>
                                     <select name="transaction_type" class="form-control m-input">
                                        <option value="">select...</option>
                                        @foreach($transactionTypes as $transactionType)
                                            <option value="{{$transactionType->id}}">{{$transactionType->name}}</option>
                                        @endforeach
                                     </select>
                                </div>
                                
                                <div class="col-3">
                                    <label >ticket number</label>
                                     <input type="text" name="ticketNumber"   class="form-control m-input" placeholder="Ticket Number" />
                                </div>
                                
                                <div class="col-3">
                                    <label >customer name</label>
                                     <input type="text" name="customerName"   class="form-control m-input" placeholder="Customer Name" />
                                </div>
                                
                                <div class="col-3">
                                    <label >Account number</label>
                                     <input type="text" name="accountNumber"  class="form-control m-input" placeholder="Account Number" />
                                </div>
                                
                                <div class="col-3">
                                    <label >Cheque number</label>
                                     <input type="text" name="chequeNumber"   class="form-control m-input" placeholder="Cheque Number" />
                                </div>
                                <div class="col-3">
                                <label ></label>
                                     <input type="submit" value="Search" name="searchCriteria" class="form-control alert alert-success"   />
                                </div>
                            </div>
                            
                        </div> 
                        <div class="form-group m-form__group row ">
                            <div class="col-7">
                                
                                <a class="btn btn-primary" href="{{ url('tickets/export-tickets').'?'.http_build_query( array_merge(request()->all(),[]) )  }}"> Export Tickets</a>
                            </div>
                        </div> 
                    
                    </form> 

                    <form class="mb-15" method="POST" action="{{ url('tickets/bulk/update') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @php
                            $user_groups = auth()
                                ->user()
                                ->UserGroups->pluck('group_id')
                                ->toArray();

                        @endphp
                        @if (in_array(8, $user_groups) && $collection->where('group_id', 8)->count() > 0)
                            <div class="row mb-6">
                                <div class="col-lg-3 mb-lg-0 mb-6">
                                    <div class="form-group">
                                        <label>Check ALl</label>
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                <input type="checkbox" name="checkall" id="checkall" />
                                                <span></span>
                                                Yes
                                            </label>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-3 mb-lg-0 mb-6">
                                    <label>Status </label>
                                    <select name="status_id" class="custom-select form-control-border">
                                        @if (count($workflow->unique('transfer_status')) > 1)
                                            <option value="">Select ....</option>
                                        @endif
                                        @foreach ($workflow->unique('transfer_status') as $value)
                                            <option value="{{ $value->status->id }}">{{ $value->status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-3 mb-lg-0 mb-6">
                                    <div class="form-group">
                                        <label>Added on Oracle ?</label>
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                <input type="checkbox" name="add_on_oracle" value="1" />
                                                <span></span>
                                                Yes
                                            </label>

                                        </div>
                                    </div>

                                </div>


                                <div class="col-lg-3 mb-lg-0 mb-6">
                                    <label>Add on oracle date</label>
                                    <input type="date" value="" name="add_on_oracle_date" class="form-control">
                                </div>


                                <div class="col-lg-3 mb-lg-0 mb-6">
                                    <label>File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="file_input[]" multiple class="custom-file-input">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!--begin: Datatable-->
                        <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- <table class="table table-bordered table-checkable dataTable no-footer dtr-inline collapsed" id="kt_datatable" role="grid" aria-describedby="kt_datatable_info" style="width: 818px;">
                        <thead>
                            <tr role="row" class="header-tr">

                                <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 61px;text-align:center" >
                                    Ticket No#

                                </th>
                                <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 50px;text-align:center" aria-label="Ship City: activate to sort column ascending">Customer Name</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 49px;" aria-label="Ship Date: activate to sort column ascending">Account</th>

                                <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 49px;" aria-label="Ship Date: activate to sort column ascending">Customer Type</th>

                                <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 49px;" aria-label="Ship Date: activate to sort column ascending">Bank Name</th>

                                <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 49px;" aria-label="Ship Date: activate to sort column ascending">Transaction Type</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 49px;" aria-label="Ship Date: activate to sort column ascending">Ticket Status</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 49px;" aria-label="Ship Date: activate to sort column ascending">Pool</th>
           <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 49px;" aria-label="Ship Date: activate to sort column ascending">Actions</th>





                            </tr>
                        </thead>
                        <tbody>


                        </tbody>


                    </table>-->
                   <!--  <div class="form-group m-form__group row ">
                            <div class="col-7">
                                @php
                                    $append = (request()->search)? "?search=".request()->search : "";
                                @endphp
                                <a class="btn btn-primary" href="{{url('tickets/export-tickets')}}{{$append}}"> Export Tickets</a>
                            </div>
                            
                           <div class="col-3">
                                <input type="text" name="search" id="search" class="form-control m-input" 
                                placeholder="Search" value="{{ request()->search }}">
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" id="confirm_search">
                                    <span>
                                        <i class="la la-search"></i>
                                        <span>Search</span>
                                    </span>
                                </button>
                            </div>
                    </div>-->
  

                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <table id="example2" class="table table-bordered table-striped"
                                            data-info="false" data-paging='false'>
                                            <thead>
                                                <tr>
                                                    <th>Ticket No#</th>
                                                    <th>Customer Name</th>
                                                    <th>Account</th>
                                                    <th>Customer Type</th>
                                                    <th>Bank Name</th>
                                                    <th>Amount</th>
                                                    
                                                    <th>Market Segment </th>
                                                    <th>Transaction Type</th>
                                                    <th>Ticket Status</th>
                                                    <th>Pool</th>
                                                    <th>Cheque Number</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @include("$view.loop", $collection)

                                            </tbody>

                                        </table>
                                    </div>
                                    {{ $collection->links('pagination::bootstrap-4') }}


                                    @if (in_array(8, $user_groups) && $collection->where('group_id', 8)->count() > 0)
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Bulk Update</button>
                                        </div>
                                    @endif

                    </form>

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
        $("#checkall").click(function() {
            $('.ticket_ids').not(this).prop('checked', this.checked);
        });
    </script>


    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": true,
                "ordering": false,
                "buttons": ["excel"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": false,
                
            });
        });

$("#confirm_search").click(function(){
     $search = $("#search").val();
     window.location.href = '{{ url("/tickets") }}?search='+$search;
  });
  $('#search').keypress(function (e) {
  if (e.which == 13) {
    $search = $("#search").val();
    window.location.href = '{{ url("/tickets") }}?search='+$search;
    return false;    //<---- Add this line
  }
});
    </script>
@endpush
