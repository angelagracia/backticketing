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

    'bo' => [
        'driver' => 'session',
        'provider' => 'user_bo',
    ],

    'portal' => [
        'driver' => 'session',
        'provider' => 'user_portals',
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

    'user_bo' => [
        'driver' => 'eloquent',
        'model' => App\Models\UserBO::class,
    ],

    'user_portals' => [
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
