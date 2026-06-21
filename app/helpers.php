<?php

use function Illuminate\Filesystem\join_paths;

if (! function_exists('user_home_path')) {
    function user_home_path(string ...$paths): ?string
    {
        $osFam = \App\Enums\OsFamily::make();
        $basePath = $osFam->isWindows() ? getenv('USERPROFILE') : ($osFam->isUnix() ? getenv('HOME') : null);
        if (blank($basePath) || $basePath === false) return null;
        $basePath = (is_array($basePath) ? array_values($basePath) : [$basePath])[0];
        return join_paths($basePath, ...$paths);
    }
}
