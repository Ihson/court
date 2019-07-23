<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Closure;

class superadminmiddleware
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
          if ($request->user() && $request->user()->role != 'superadmin')
          {
          return new Response(view('unauthorized')->with('role', 'SuperAdmin'));
          }
          return $next($request);
      }
}
