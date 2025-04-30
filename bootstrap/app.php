<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Middleware\BroadcastAuthMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            'broadcast.auth' => \App\Http\Middleware\EnsureBroadcastAuthenticated::class,
            'check.guard' => \App\Http\Middleware\CheckGuard::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //

       
        
    })->create();
