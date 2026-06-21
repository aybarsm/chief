<?php

use App\Framework\Chief;

return [
    'paths' => [
        resource_path('views'),
    ],
    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(Chief::pathFramework('views'))
    ),
];
