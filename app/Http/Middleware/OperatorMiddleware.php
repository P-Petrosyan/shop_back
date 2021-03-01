<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;


class OperatorMiddleware
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
        if(Auth::user()->roles !== 'admin'){
            return redirect()->back();
        }
            return $next($request);
    }
}
