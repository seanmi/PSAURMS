<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Response;

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
        //dd($request->user());
        if($request->user()->administrator !=1){

            return new Response(view('unauthorized')->with('administrator', 'No' ));

        }

        return $next($request);
    }
}
