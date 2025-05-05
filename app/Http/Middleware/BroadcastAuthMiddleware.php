<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class BroadcastAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('bo')->check()) {
            Log::info('BroadcastAuthMiddleware: user bo terautentikasi');
            Auth::shouldUse('bo');
        } elseif (Auth::guard('portal')->check()) {
            Log::info('BroadcastAuthMiddleware: user portal terautentikasi');
            Auth::shouldUse('portal');
        } else {
            Log::warning('BroadcastAuthMiddleware: tidak ada user terautentikasi', [
                'bo' => Auth::guard('bo')->check(),
                'portal' => Auth::guard('portal')->check()
            ]);
            return response()->json(['message' => 'Unauthorized.'], 403);
        }
    
        return $next($request);
    }
    
}
