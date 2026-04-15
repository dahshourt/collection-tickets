@extends('layouts.master', ['title' => 'Ticket Logs'])

@section('content')

    <div class="d-flex flex-column-fluid">
        <div class="container">

            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            <i class="fa fa-history text-warning mr-2"></i>
                            Ticket Log History
                            <span class="d-block text-muted pt-2 font-size-sm">
                                All changes and activity for this ticket
                            </span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="javascript:history.back()" class="btn btn-light-primary font-weight-bolder">
                            <i class="fa fa-arrow-left mr-1"></i> Back
                        </a>
                    </div>
                </div>

                <div class="card-body">

                    @if (isset($logs) && count($logs) > 0)
                        <div class="timeline timeline-3">
                            <div class="timeline-items">

                                @foreach ($logs as $log)
                                    <div class="timeline-item">
                                        <div class="timeline-media">
                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                <i class="fa fa-clock-o text-primary" style="font-size:20px;"></i>
                                            </span>
                                        </div>
                                        <div class="timeline-desc timeline-desc-light-primary">
                                            <span class="font-weight-bolder text-primary">

                                                {{ $log->created_at->format('d-m-Y H:i:s') }}
                                            </span>
                                            <p class="font-weight-normal text-dark-50 pb-2 mb-0 mt-1">
                                                {{ $log->log_text }}
                                            </p>
                                            @if ($log->user_id)
                                                <small class="text-muted">
                                                    <i class="fa fa-user mr-1"></i>
                                                    {{ optional(\App\Models\User::find($log->user_id))->user_name ?? 'System' }}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @else
                        <div class="text-center py-10">
                            <i class="fa fa-history" style="font-size:48px; color:#d0d0d0;"></i>
                            <p class="text-muted mt-4 font-size-lg">No log history found for this ticket.</p>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>

@endsection
