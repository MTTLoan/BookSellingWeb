<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotEmployee
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth('web')->check()) {  // Check if the user is logged in and has the 'employee' role
            return redirect()->route('admin.login');  // Redirect to login if not an authenticated employee
        }

        return $next($request);
    }
}