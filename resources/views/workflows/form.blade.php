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
							<input type="hidden" name="category_id" value="1" />
							<input type="hidden" name="active" value="1" />
							<div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Transaction Type</label>
                                    <select name="transaction_type_id" class="custom-select form-control-border" >
                                        <option value="">Select ....</option>
                                        @foreach($transaction_types as $item)
                                           <option   value="{{$item->id}}"
											   {{ isset($row) && $row->transaction_type_id ==$item->id ? 'selected' : ""  }}
										   >{{$item->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('transaction_type_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
                                </div>
                            </div>
							
							<div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Creator Group <span style="color:red">*</span></label>
                                    <select name="creator_group_id" class="custom-select form-control-border" >
                                        <option value="">Select ....</option>
                                        @foreach($groups as $item)
                                           <option   value="{{$item->id}}"
											   {{ isset($row) && $row->creator_group_id ==$item->id ? 'selected' : ""  }}
										   >{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('creator_group_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
                                </div>
                            </div>
							
							<div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Previous Group</label>
                                    <select name="previous_group" class="custom-select form-control-border" >
                                        <option value="">Select ....</option>
                                        @foreach($groups as $item)
                                           <option   value="{{$item->id}}"
										   {{ isset($row) && $row->previous_group ==$item->id ? 'selected' : ""  }}
										   >{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('previous_group')
                <small class="text-danger">{{ $message }}</small>
            @enderror
                                </div>
                            </div>
							
							
							<div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">From Group</label>
                                    <select name="current_group" class="custom-select form-control-border" >
                                        <option value="">Select ....</option>
                                        @foreach($groups as $item)
                                           <option   value="{{$item->id}}"
										   {{ isset($row) && $row->current_group ==$item->id ? 'selected' : ""  }}
										   >{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('current_group')
                <small class="text-danger">{{ $message }}</small>
            @enderror
                                </div>
                            </div>
							
							<div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">To Group</label>
                                    <select name="transfer_group" class="custom-select form-control-border" >
                                        <option value="">Select ....</option>
                                        @foreach($groups as $item)
                                           <option   value="{{$item->id}}"
										   {{ isset($row) && $row->transfer_group ==$item->id ? 'selected' : ""  }}
										   >{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('transfer_group')
                <small class="text-danger">{{ $message }}</small>
            @enderror
                                </div>
                            </div>
							
							<div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">From status</label>
                                    <select name="current_status" class="custom-select form-control-border" >
                                        <option value="">Select ....</option>
                                        @foreach($statuses as $item)
                                           <option   value="{{$item->id}}"
										   {{ isset($row) && $row->current_status ==$item->id ? 'selected' : ""  }}
										   >{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('current_status')
                <small class="text-danger">{{ $message }}</small>
            @enderror
                                </div>
                            </div>
							
							<div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleSelectBorder">To status</label>
                                    <select name="transfer_status" class="custom-select form-control-border" >
                                        <option value="">Select ....</option>
                                        @foreach($statuses as $item)
                                           <option   value="{{$item->id}}"
										   {{ isset($row) && $row->transfer_status ==$item->id ? 'selected' : ""  }}
										   >{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('transfer_status')
                <small class="text-danger">{{ $message }}</small>
            @enderror
                                </div>
                            </div>

  
</div>