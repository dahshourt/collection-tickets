@extends('layouts.master',['title' => $title ])

@section('content')



<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <!--begin::Card-->
             <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                   <h3 class="card-title">edit {{ $form_title }}</h3>
                  
                </div>
                <!--begin::Form-->
                <form class="m-form" action="{{route('users.update',$user)}}" method="post" enctype="multipart/form-data">
                    
                    {{ csrf_field() }}
                    @include("$view.edit_form")
					<!--<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
    <option></option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
</select>

<select class="form-select form-select-sm form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
    <option></option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
</select>

<select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
    <option></option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
</select>-->
                   <div class="card-footer">
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <a href="{{route('users.index')}}" type="reset" class="btn btn-secondary">Cancel</a>
                   </div>
                </form>
                <!--end::Form-->
             </div>
             <!--end::Card-->
             <!--begin::Card-->
             
             <!--end::Card-->
          </div>
          
       </div>
    </div>
    <!--end::Container-->
 </div>



@endsection
@push('page_script')
<script>
$(document).ready(function(){
		$('#framework').select2({
			multiple:true
		});
});
</script>
@endpush