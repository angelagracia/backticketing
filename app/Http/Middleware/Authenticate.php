<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
{
    if (! $request->expectsJson()) {

        // Cek apakah URL mengarah ke dashboard BO
        if ($request->is('dashboard-bo*') || $request->routeIs('bo.*')) {
            return route('login.bo');
        }

        // Cek apakah URL mengarah ke halaman user portal
        if ($request->is('home*') || $request->routeIs('home')) {
            return route('login.portal');
        }

        // Fallback ke portal juga
        return route('login.portal');
    }
}

    }
    
}
