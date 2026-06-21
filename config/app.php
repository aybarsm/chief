<?php

return [
    'name' => 'Chief',
    'version' => app('git.version'),
    'env' => 'development',
    'providers' => [
        App\Providers\AppServiceProvider::class,
        App\Providers\ChiefServiceProvider::class,
    ],
];
