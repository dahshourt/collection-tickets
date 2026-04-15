{{--
  ADD THIS LOGS BUTTON to the tickets/index.blade.php card-toolbar section
  Place it next to other toolbar buttons like Export.

  Find the card-toolbar div in your tickets/index.blade.php and add:
--}}

@if(Auth::user()->role == 1)
<button type="button" class="btn btn-warning font-weight-bolder ml-2" onclick="showLogs('Ticket')">
    <i class="fa fa-history"></i> Ticket Logs
</button>
@endif
