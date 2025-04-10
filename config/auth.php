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
    'portal' => [
        'driver' => 'session',
        'provider' => 'user_portals',
    ],
    'bo' => [
        'driver' => 'session',
        'provider' => 'user_bo',
    ],
],


//     'providers' => [
//     'users' => [
//         'driver' => 'eloquent',
//         'model' => App\Models\User::class,
//     ],
//     'users_portal' => [
//         'driver' => 'eloquent',
//         'model' => App\Models\UserPortal::class,
//     ],
// ],

'providers' => [
   'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],
    'user_portals' => [
        'driver' => 'eloquent',
        'model' => App\Models\UserPortal::class,
    ],
    'user_bo' => [
        'driver' => 'eloquent',
        'model' => App\Models\UserBo::class,
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
