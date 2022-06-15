<div class="card-body">
    @if($errors->any())
                        <div class="m-alert m-alert--icon alert alert-danger" role="alert" id="m_form_1_msg">
                            <div class="m-alert__icon">
                                <i class="la la-warning"></i>
                            </div>
                            <div class="m-alert__text">
                                There are some errors
                            </div>
                            <div class="m-alert__close">
                                <button type="button" class="close" data-close="alert" aria-label="Close">
                                </button>
                            </div>
                        </div>
                    @endif
                    
    <div class="form-group">
        <label>Category Title: <span class="text-danger">*</span></label>
        <input type="text" class="form-control" placeholder="Enter Category Title" value="{{ (isset($row) && $row->name)? $row->name: old('name') }}" name="name">
        {!! $errors->first('name', '<span class="form-control-feedback">:message</span>') !!}
    </div>

    <div class="form-group">
        <div class="checkbox-list">
           <label class="checkbox">
           <input type="checkbox" name="active" value="1" {{ (isset($row) && $row->active)? 'checked': '' }}>
           <span></span>Active</label>
        </div>
     </div>
  
</div>