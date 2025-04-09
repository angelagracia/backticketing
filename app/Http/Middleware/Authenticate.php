<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            if ($request->is('portal/*')) {
                return route('portal.login'); // Pastikan route ini ada
            }

            if ($request->is('bo/*')) {
                return route('bo.login');
            }

            return route('login');
        }

        return null;
    }
}
