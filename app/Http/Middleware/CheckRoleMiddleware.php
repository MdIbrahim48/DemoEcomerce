<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if(Auth::user()->role == 'SuperAdmin' || Auth::user()->role == 'Admin' || Auth::user()->role == 'Moderator'){
                return $next($request);
            }
            else{
                Auth::logout();

            }
        }
        else {
            return redirect('/');
        }

    }
}
