<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
//        dd(Auth::user()->user_permissions);
        if (Auth::check() && Auth::user()->user_permissions == 1)
        {
//            dd($next);
            return $next($request);
        }

        return redirect('/admin/login')->withErrors('You must login to view this page.');
    }
}