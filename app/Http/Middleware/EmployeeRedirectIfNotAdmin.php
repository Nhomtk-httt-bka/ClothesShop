<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EmployeeRedirectIfNotAdmin
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
        if (Auth::guard('admin')->check()) {
            if(Auth::guard('admin')->user()->admin_status == 2){
                return $next($request);    
            }else if(Auth::guard('admin')->user()->admin_status == 1){
                return redirect('transactions');
            }
        }
        return redirect('admins');
    }
}
