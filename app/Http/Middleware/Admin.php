<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        
        if (Auth::check() && Auth::user()->Admin()) {
        
         return $next($request);
     }
        $x= "Don't";
        return redirect('/')->withAlert(" Sorry! You $x Have Administration Access.!!!! ");
        }
}
