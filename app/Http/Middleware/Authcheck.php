<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authcheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('LoggedUser') && $request->path() !== '/') {
            return redirect('/')->with('fail', 'You must be logged in');
        }
        if (session()->has('LoggedUser') && $request->path() == '/') {
            return back();
        }
        return $next($request);
    }
}
