<?php

namespace App\Http\Middleware;

use Closure;

class UserTypeMiddleware
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
        if ($request->user() && $request->user()->type != 1){
            return view('unauthorized')->with('role', 'CLUB');
        }else{
            return view('unauthorized')->with('role', 'ADMIN');
        }

        return $next($request);
    }
}
