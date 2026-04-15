<?php
/*
|──────────────────────────────────────────────────────────────────────────────
| TEMPORARY TEST ROUTE — add to routes/web.php inside the auth middleware group
|
|   Route::get('test-log', function() {
|       try {
|           $cols = \Schema::getColumnListing('administration_logs');
|           \DB::table('administration_logs')->insert([
|               'user_id'    => \Auth::id(),
|               'category'   => 'Ticket',
|               'action'     => 'View',
|               'details'    => 'TEST LOG - if you see this it works',
|               'created_at' => now(),
|               'updated_at' => now(),
|           ]);
|           return response()->json([
|               'status'  => 'SUCCESS — log written',
|               'columns' => $cols,
|               'count'   => \DB::table('administration_logs')->where('category','Ticket')->count(),
|           ]);
|       } catch(\Exception $e) {
|           return response()->json([
|               'status' => 'FAILED',
|               'error'  => $e->getMessage(),
|               'columns' => \Schema::getColumnListing('administration_logs'),
|           ]);
|       }
|   });
|
| Then visit: http://192.168.129.133/collection_tickets/index.php/test-log
| Paste the JSON response here so we can diagnose the exact error.
|──────────────────────────────────────────────────────────────────────────────
*/
