<?php

use App\Models\UserPortal;

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],
    'users_portal' => [
        'driver' => 'session',
        'provider' => 'users_portal',
    ],
],


    'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],
    'users_portal' => [
        'driver' => 'eloquent',
        'model' => App\Models\UserPortal::class,
    ],
],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,
];
