<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RedirectIfUnauthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard === 'bo') {
                    return redirect('/dashboard-bo');
                } elseif ($guard === 'portal') {
                    return redirect('/portal/dashboard');
                }
            }
        }
    
        return $next($request);
    }
    

    protected function redirectTo($request): ?string
{
    if (! $request->expectsJson()) {
        if ($request->is('portal/*')) {
            return route('login'); // atau 'login-portal' jika kamu pakai nama ini
        }

        return route('login'); // default
    }

    return null;
}

}

