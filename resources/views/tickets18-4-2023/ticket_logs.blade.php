
@extends('layouts.master')
@section('content')

 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ticket Logs</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                    <div class="card-body">
                        <div class="row">
                      @foreach($logs as $log)
                             <div class="col-md-12">
                                <div class="form-group" id="transaction" style="   background: gainsboro;
                                ">
                                    <label for="exampleSelectBorder"> {{$log->user->user_name}} -{{$log->created_at->format('d-m-y ,g:i A')}}</label>



                                </div>
                                <div class="form-group" id="transaction">
                                    <label for="exampleSelectBorder">  {{$log->log_text}}
                                    </label>


                                </div>
                            </div>
                            @endforeach










            </div>

@endsection

