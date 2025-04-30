<?php

use App\Models\UserPortal;

return [

    'defaults' => [
        'guard' => 'bo',
        'passwords' => 'user_bo',
    ],

   'guards' => [
    // 'web' => [
    //     'driver' => 'session',
    //     'provider' => 'users',
    // ],
    'portal' => [
        'driver' => 'session',
        'provider' => 'user_portals',
    ],
    'bo' => [
        'driver'   => 'session',
        'provider' => 'users',      // ganti dari 'user_bo'
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
//    'users' => [
//         'driver' => 'eloquent',
//         'model' => App\Models\User::class,
//     ],
    'user_portals' => [
        'driver' => 'eloquent',
        'model' => App\Models\UserPortal::class,
    ],
    'users' => [
        'driver' => 'eloquent',
        'model'  => App\Models\User::class,  // model default
    ],
],
    'passwords' => [
        'user_bo' => [
            'provider' => 'user_bo',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'user_portals' => [
            'provider' => 'user_portals',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],


    'password_timeout' => 10800,
];
