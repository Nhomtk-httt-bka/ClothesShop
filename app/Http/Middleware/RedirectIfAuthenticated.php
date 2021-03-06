<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
        if (Auth::guard('admin')->check()) {
            if(Auth::guard('admin')->user()->admin_status == 0){
                return redirect('admins')->withErrors(['This account was blocked, please contact admin to support']);
            }
            return $next($request);
        }

        return redirect('admins');
    }
}
