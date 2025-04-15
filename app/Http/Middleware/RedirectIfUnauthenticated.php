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
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard === 'bo') {
                    return redirect()->route('dashboard'); // atau /dashboard
                } elseif ($guard === 'portal') {
                    return redirect()->route('home'); // atau /home
                } else {
                    return redirect('/'); // fallback
                }
            }
        }

        return $next($request);
    }

    protected function redirectTo($request): ?string
{
    if (! $request->expectsJson()) {
        if ($request->is('portal/*')) {
            return route('login-portal'); // atau 'login-portal' jika kamu pakai nama ini
        }

        return route('login'); // default
    }

    return null;
}

}

