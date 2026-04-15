
@extends('layouts.master')
@section('content')
 
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
       
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">My Tickets
                    <span class="d-block text-muted pt-2 font-size-sm">List My All Tickets</span></h3>
                </div>
                <div class="card-toolbar">
                    
                    <!--begin::Button-->

                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
      
      
           
      
                <!--begin: Datatable-->
                <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row">
                    <div class="col-sm-12">
                 
                
                  
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Ticket No#</th>
            <th>Ticket creation date</th>
            <th>Bank transaction date</th>
                        <th>Customer Name</th>
                        <th>Account</th>
                        <th>Customer Type</th>
                        <th>Bank Name   </th>
            <th> Amount </th>
            <th>  Market Segment </th>
                        <th>Transaction Type</th>
                        <th>Ticket Status</th>
                        <th>Pool</th>
            <th>Cheque Number</th>
            <th>Added on Oracle Date</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                       
                      @include("$view.myTickets.loop")
                      
                      </tbody>
             
               
             
                    </table>
          {!! $listMyTickets->render() !!}
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
  $("#checkall").click(function () {
    $('.ticket_ids').not(this).prop('checked', this.checked);
  });
</script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": true,"ordering": false,"paging": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

@endpush
