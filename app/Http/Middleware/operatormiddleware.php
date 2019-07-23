<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Closure;

class operatormiddleware
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
               if ($request->user() && $request->user()->role != '1' ||$request->user()->role != '2' ||$request->user()->role != '3' )
               {
               return new Response(view('unauthorized')->with('role', 'Court Operators'));
               }
               return $next($request);
           }
}
