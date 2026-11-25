<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        foreach ($guards ?: [null] as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = optional(Auth::guard($guard)->user()->role)->role;
                return redirect($role === 'admin' ? '/dashboard' : '/antrian');
            }
        }

        return $next($request);
    }
}
