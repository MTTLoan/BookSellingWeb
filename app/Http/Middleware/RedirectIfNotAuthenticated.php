<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {
                session()->flash('error', 'Bạn cần đăng nhập để truy cập trang này.');
                return redirect()->route('account.login')->with('error', 'Bạn cần đăng nhập để truy cập trang này.');
            }

        return $next($request);
    }
}