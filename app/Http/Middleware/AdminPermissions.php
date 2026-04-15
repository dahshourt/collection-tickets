<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class AdminPermissions
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
        $user = Auth::user();

        // Check if user is authenticated and has role == 1 and username matches
        if ($user && $user->role == 1 || in_array($user->user_name, ['walid.dahshour', 'sara.mostafa','Ahmed.O.Hasan','ahmed.elfeel','Mahmoud.bastawisy'
        ,'Tarek.Kamaleldin'])) {
            return $next($request);
        }

        // Redirect to home if conditions are not met
        return redirect('/');
    }
}
