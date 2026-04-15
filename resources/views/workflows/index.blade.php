@extends('layouts.master')
@section('content')

<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">{{ $title }}</h3>
                </div>
                <div class="card-toolbar">
                    @if(Auth::user()->role == 1)
                    <button type="button" class="btn btn-warning font-weight-bolder ml-2" onclick="showLogs('Workflow')">
                        <i class="fa fa-history"></i> Logs
                    </button>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-checkable dataTable" id="kt_datatable">
                    <thead>
                        <tr>
                            <th>Transaction Type</th>
                            <th>Previous Group</th>
                            <th>From Group</th>
                            <th>From Status</th>
                            <th>To Group</th>
                            <th>To Status</th>
                            <th>Creator Group</th>
                            <th>Action</th>
                        </tr>
                        <tr class="filter-row">
                            <th><input type="text" class="form-control search-input" placeholder="Search Transaction Type"></th>
                            <th><input type="text" class="form-control search-input" placeholder="Search Previous Group"></th>
                            <th><input type="text" class="form-control search-input" placeholder="Search From Group"></th>
                            <th><input type="text" class="form-control search-input" placeholder="Search From Status"></th>
                            <th><input type="text" class="form-control search-input" placeholder="Search To Group"></th>
                            <th><input type="text" class="form-control search-input" placeholder="Search To Status"></th>
                            <th><input type="text" class="form-control search-input" placeholder="Search Creator Group"></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @include("$view.loop")
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>

{{-- Logs Modal --}}
@include('partials.logs_modal')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.search-input').on('keyup', function() {
        let searchValues = [];
        $('.search-input').each(function(index) {
            searchValues[index] = $(this).val().toLowerCase().trim();
        });

        $('#kt_datatable tbody tr').each(function() {
            let row = $(this);
            let matchAll = true;

            row.find('td').each(function(index) {
                let cellText = $(this).text().toLowerCase();
                let searchText = searchValues[index];
                if (searchText && cellText.indexOf(searchText) === -1) {
                    matchAll = false;
                    return false;
                }
            });

            row.toggle(matchAll);
        });
    });
});
</script>

@endsection
