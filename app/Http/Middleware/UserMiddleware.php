<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Response;

class UserMiddleware
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
        if($request->user()->administrator ==1){

            return new Response(view('unauthorized')->with('user', 'No' ));

        }
        return $next($request);
    }
}
