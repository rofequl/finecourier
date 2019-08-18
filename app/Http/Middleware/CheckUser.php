<?php

namespace App\Http\Middleware;
use Session;
use Closure;

class CheckUser
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
        if(Session::get('user-email') != null) {
            return $next($request);
        } else {
            if (isset($_COOKIE['user-email']) && isset($_COOKIE['user-id'])){
                Session::put('user-email', $_COOKIE['user-email']);
                Session::put('user-id', $_COOKIE['user-id']);
                return $next($request);
            }else{
                return redirect('/login');
            }
        }
    }
}
