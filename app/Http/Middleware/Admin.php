<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has admin privileges
        if (Auth::user()->role== 'admin') {
            return $next($request);
        }else {
            // Redirect to home or show an unauthorized access message
            return redirect('/')->with('error', 'You do not have admin access.');
        }
        
    }
}
