<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'volunteers',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'volunteers',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'super_admins',
        ],
    ],

    'providers' => [
        'volunteers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Volunteer::class,
        ],

        'super_admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\SuperAdmin::class,
        ],
    ],

    'passwords' => [
        'volunteers' => [
            'provider' => 'volunteers',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];