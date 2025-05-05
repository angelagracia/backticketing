<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureBroadcastAuthenticated
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('bo')->check() || Auth::guard('portal')->check()) {
            return $next($request);
        }

        return redirect('/login/portal'); // atau abort(403)
    }
}
