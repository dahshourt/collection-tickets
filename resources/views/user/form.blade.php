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
                <h5 class="text-dark font-weight-bold mb-10">create user </h5>
                <!--begin::Group-->
                <div class="form-group row fv-plugins-icon-container">
                    <label class="col-xl-3 col-lg-3 col-form-label">user Name</label>
                    <div class="col-lg-9 col-xl-9">
                        <input class="form-control form-control-solid form-control-lg" name="user_name" type="text" value="" required>



                        <div class="fv-plugins-message-container"></div></div>
                </div>
                <!--end::Group-->
                <!--begin::Group-->
                <div class="form-group row fv-plugins-icon-container">
                    <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                    <div class="col-lg-9 col-xl-9">
                        <input class="form-control form-control-solid form-control-lg" name="first_name" type="text" value="" required>
                        <div class="fv-plugins-message-container"></div></div>
                </div>
                <!--end::Group-->
                <!--begin::Group-->
                {{--  <div class="form-group row fv-plugins-icon-container">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <input class="form-control form-control-solid form-control-lg" name="last_name" type="text" value="" required>
                                        <div class="fv-plugins-message-container"></div></div>
                                    </div>  --}}

                <!--begin::Group-->
                <div class="form-group row fv-plugins-icon-container">
                    <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                    <div class="col-lg-9 col-xl-9">
                        <div class="input-group input-group-solid input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-at"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control form-control-solid form-control-lg" name="email" value="" required>
                        </div>
                        <div class="fv-plugins-message-container"></div></div>
                </div>

                <div class="form-group row fv-plugins-icon-container">
                    <label class="col-xl-3 col-lg-3 col-form-label">password</label>
                    <div class="col-lg-9 col-xl-9">
                        <input class="form-control form-control-solid form-control-lg" name="password" type="password" value="" required>
                        <div class="fv-plugins-message-container"></div></div>
                </div>


                <div class="form-group row fv-plugins-icon-container">
                    <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
                    <div class="col-lg-9 col-xl-9">
                        <div class="input-group input-group-solid input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-phone"></i>
                                </span>
                            </div>
                            <input type="number" class="form-control form-control-solid form-control-lg" name="phone" value="" placeholder="Phone">
                        </div>

                        <div class="fv-plugins-message-container"></div></div>
                </div>



                <div class="form-group row fv-plugins-icon-container">
                    <label class="col-xl-3 col-lg-3 col-form-label">select group</label>
                    <div class="col-lg-9 col-xl-9">
                        <div class="input-group input-group-solid input-group-lg">

                            <select id="framework" name="groups[]" multiple class="form-control" >
                                @foreach ($groups as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach


                            </select>
                        </div>

                        <div class="fv-plugins-message-container"></div></div>
                </div>

 <div class="form-group row fv-plugins-icon-container">
                    <label  class="col-xl-3 col-lg-3 col-form-label" for="role">Role:</label>
                    <select  class="col-lg-9 col-xl-9" name="role" id="role" required >
                    <option value=" ">none</option>
                        <option value="1">admin</option>
                        <option value="2">user</option>

                    </select>
                </div>

                <div class="form-group">
                    <div class="checkbox-list">
                        <label class="checkbox">
                            <input type="checkbox" name="active" value="1" {{ (isset($row) && $row->active)? 'checked': '' }}>
                            <span></span>Active</label>
                    </div>
                </div>
               





            </div>

        </div>
    </div>
    <div></div><div></div><div></div>



</div>