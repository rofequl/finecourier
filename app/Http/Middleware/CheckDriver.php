<?php

namespace App\Http\Middleware;
use Session;
use Closure;

class CheckDriver
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
        if(Session::get('driver-email') != null) {
            return $next($request);
        } else {
            return redirect('/driver-login');
        }
    }
}
