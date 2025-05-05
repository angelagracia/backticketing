<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // ⬇️ Tambahkan logic untuk multi-guard (bo dan portal)
        Gate::before(function ($user, $ability) {
            // Coba deteksi guard user berdasarkan class user-nya
            if ($user instanceof \App\Models\UserBo && $user->hasPermissionTo($ability, 'bo')) {
                return true;
            }
        
            if ($user instanceof \App\Models\UserPortal && $user->hasPermissionTo($ability, 'portal')) {
                return true;
            }
        
            return null;
        });
        
    }
}
