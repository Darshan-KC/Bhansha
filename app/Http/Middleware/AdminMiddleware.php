<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (Auth::check()) {
            if (Auth::user()->role->role === 'admin') {
                return $next($request);
            }
            return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
        }

        // Check if the current route exists and is named
        if (request()->routeIs('login')) {
            // If the current route is 'login', allow the request to proceed without redirection
            return $next($request);
        }

            return redirect()->route('login');


    }
}
