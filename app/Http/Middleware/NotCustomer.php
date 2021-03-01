<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class NotCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
        // if(Auth::user()->roles == 'admin'){
        //     return $next($request);
        // }
        // return redirect("/home");
    }
}
