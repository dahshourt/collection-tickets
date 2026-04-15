								<div class="col-md-6" style="float:right">
									<div class="form-group">
										<label for="exampleSelectBorder">Group</label>
										<select name="group_id" class="custom-select form-control-border" >
											@if(isset($workflow))
												<option value="{{isset($workflow)? $workflow->group->id : ""}}">{{ isset($workflow) ?$workflow->group->name : ""}}</option>
											@else
												<option value="">Select ....</option>
											@endif
											
										</select>
									</div>
								</div>
								<div class="col-md-6" style="margin-left: -13px;">
									<div class="form-group">
										<label for="exampleSelectBorder">Status   </label>
										<select name="status_id" class="custom-select form-control-border" id="exampleSelectBorder">
											@if(isset($workflow))
												<option  value="{{isset($workflow)? $workflow->status->id : ""}}">{{$workflow ? $workflow->status->name : ""}}</option>
											@else
												<option value="">Select ....</option>
											@endif
											
										</select>
									</div>
								</div>
							