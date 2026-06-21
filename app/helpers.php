<?php

if (! function_exists('user_home_path')) {
    function user_home_path(string ...$paths): ?string
    {
        return \App\Support\Filesystem::pathUserHome(...$paths);
    }
}

if (! function_exists('chief_path')) {
    function chief_path(string ...$paths): ?string
    {
        return \App\Framework\Chief::path(...$paths);
    }
}

if (! function_exists('chief_share_path')) {
    function chief_share_path(string ...$paths): ?string
    {
        return \App\Framework\Chief::pathShare(...$paths);
    }
}
