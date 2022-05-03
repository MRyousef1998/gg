<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class EmailedVerfied
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { if(Auth::user()==null)
       {
           return route('login');
       }
       else{
       $user=Auth::user();
       if($user->email_verified ){
           return route('home'); 
       }}
       
        return $next($request);
    }
}
