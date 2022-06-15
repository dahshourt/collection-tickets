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
                    
                 
                        <div class="row justify-content-center">
                            <div class="col-xl-9">
                                <!--begin::Wizard Step 1-->
                                <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                    <h5 class="text-dark font-weight-bold mb-10">create group </h5>
                                    <!--begin::Group-->
                                    <div class="form-group row fv-plugins-icon-container">
                                        <label class="col-xl-3 col-lg-3 col-form-label">group Name</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <input class="form-control form-control-solid form-control-lg" name="name" type="text" value="{{$group->name}}" required>
                                            
                                            
                                          
                                        <div class="fv-plugins-message-container"></div></div>
                                    </div>
                                    <!--end::Group-->
                                    <div class="form-group row fv-plugins-icon-container">
                                        <label class="col-xl-3 col-lg-3 col-form-label"> Group Email </label>
                                        <div class="col-lg-9 col-xl-9">
                                            <div class="input-group input-group-solid input-group-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-at"></i>
                                                    </span>
                                                </div>
                                                <input type="email" class="form-control form-control-solid form-control-lg" name="group_email" value="{{$group->group_email}}" required>
                                            </div>
                                        <div class="fv-plugins-message-container"></div></div>
                                    </div>
                                    <!--begin::Group-->
                                 
                                    <!--end::Group-->
                                    <div class="form-group row fv-plugins-icon-container">
                                        <label class="col-xl-3 col-lg-3 col-form-label">description</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <div class="input-group input-group-solid input-group-lg">
                                                
                                                <textarea class="form-control form-control-solid form-control-lg" name="description"  rows="3">
                                                    {{$group->description}}
                                                </textarea>
                                               
                                            </div>
                                        <div class="fv-plugins-message-container"></div></div>
                                    </div>
                                    <!--begin::Group-->
                                   
                                    <!--begin::Group-->
                                  

                                    


                                   
                                    <div class="form-group">
                                        <div class="checkbox-list">
                                           <label class="checkbox">
                                           <input type="checkbox" name="active" value="1" {{ ( $group->active)? 'checked': '' }}>
                                           <span></span>Active</label>
                                        </div>
                                     </div>
                                </div>
                                
                            </div>
                        </div>
                    <div></div><div></div><div></div>

   
  
</div>