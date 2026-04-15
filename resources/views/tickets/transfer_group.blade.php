<select name="group_id" class="custom-select form-control-border" >
	@if($transfer_group && isset($transfer_group->group))
		<option value="{{ $transfer_group->group->id }}">{{ $transfer_group->group->name }}</option>	
	@else
		<option value="">Select ....</option>	
	@endif
	
	
</select>