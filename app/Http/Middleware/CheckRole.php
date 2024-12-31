<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{

    public function handle(Request $request, Closure $next, $role){
        if (!Auth::user() || Auth::user()->role !== $role) {
            return redirect()->route('home'); // Redirect if the user doesn't have the required role
        }

        return $next($request);
    }
}