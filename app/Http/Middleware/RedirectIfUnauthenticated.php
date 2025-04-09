<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RedirectIfUnauthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return $next($request);
            }
        }

        $guard = $guards[0] ?? 'web';

        switch ($guard) {
            case 'bo':
                $login = route('bo.login');
                break;
            case 'portal':
                $login = route('portal.login');
                break;
            default:
                $login = route('login');
        }

        return redirect()->guest($login);
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

