<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckGuard
{
    public function handle(Request $request, Closure $next)
    {
        $guards = ['bo', 'portal']; // Daftar guard yang ingin diperiksa

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return $next($request);
            }
        }

        return redirect()->route('login');
    }
}

