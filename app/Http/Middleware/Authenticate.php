<?php

namespace App\Http\Middleware;

use Illuminate\Support\Str;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    protected function redirectTo($request): ?string
    {
        if (!$request->expectsJson()) {
            if ($request->is('dashboard*')) {
                return route('login.bo');
            } elseif ($request->is('home*') || $request->is('portal*')) {
                return route('login.portal');
            }
        }
    
        return route('login.portal');
    }
    
    
    
    
    
    


}
    