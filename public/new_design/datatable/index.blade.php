
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
                    <span class="d-block text-muted pt-2 font-size-sm">List All Tickets</span></h3>
                </div>
                <div class="card-toolbar">
                    
                    <!--begin::Button-->

                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
			
			 
					<form class="mb-15" method="POST" action="{{ url('tickets/bulk/update') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						@php
							$user_groups = auth()->user()->UserGroups->pluck('group_id')->toArray();
							
						@endphp
						@if (in_array(8, $user_groups) && $collection->where('group_id',8)->count() > 0)
    
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
                                <label  >Status   </label>
                                    <select  name="status_id"  class="custom-select form-control-border" >
										@if(count($workflow->unique('transfer_status')) > 1)
											<option value="">Select ....</option>
											@endif
                                            @foreach($workflow->unique('transfer_status') as $value)
                                            <option value="{{$value->status->id}}">{{$value->status->name}}</option>
                                        @endforeach 
                                    </select>
                            </div>
							
							<div class="col-lg-3 mb-lg-0 mb-6">
								<div class="form-group">
									<label>Added on Oracle ?</label>
									<div class="checkbox-list">
										<label class="checkbox">
											<input type="checkbox" name="add_on_oracle" value="1"/>
											<span></span>
											Yes
										</label>
										
									</div>
								</div>
                                
                            </div>	
							
							
							<div class="col-lg-3 mb-lg-0 mb-6">
                                <label >Add on oracle date</label>
								<input type="date" value=""   name="add_on_oracle_date" class="form-control">
                            </div>
							
							
							<div class="col-lg-3 mb-lg-0 mb-6">
                                 <label>File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="file_input[]" multiple class="custom-file-input" >
                                            <label class="custom-file-label"  >Choose file</label>
                                        </div>
                                    </div>
                            </div>
						</div>
						@endif
			
                <!--begin: Datatable-->
                <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row">
                    <div class="col-sm-12">
                    <table class="table table-bordered table-checkable dataTable no-footer dtr-inline collapsed" id="kt_datatable" role="grid" aria-describedby="kt_datatable_info" style="width: 818px;">
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
                        @include("$view.loop")

                    </tbody>


                </table>
				
				@if (in_array(8, $user_groups) && $collection->where('group_id',8)->count() > 0)
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


  <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                  </tr>
                  
                  <tr>
                    <td>Other browsers</td>
                    <td>All others</td>
                    <td>-</td>
                    <td>-</td>
                    <td>U</td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

@endsection

@push('script')
<script>
	$("#checkall").click(function () {
		$('.ticket_ids').not(this).prop('checked', this.checked);
	});
</script>
@endpush
