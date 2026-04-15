<?php

namespace App\Http\Middleware;

use App\Models\ticket;
use App\Models\User;
use Auth;
use Closure;
use Illuminate\Http\Request;

class UserPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id = $request->route('id');
        $ticket = ticket::find($id);
        $group = $ticket->group_id;
        $user_id = Auth::user()->id;
        $data = User::whereHas('groups', function ($query) use ($group) {
            $query->where('group_id', $group);
        })->where('id', $user_id)->get();
        //dd($data);

        if (count($data) > 0) {
            return $next($request);
        } else {

            return redirect('/')->with('status', "Ticket not in your groups");
        }
    }
}
