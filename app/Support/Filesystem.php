<?php

namespace App\Support;

class Filesystem
{
    public static function pathJoin(string $basePath, string ...$paths): string
    {
        return \Illuminate\Filesystem\join_paths($basePath, ...$paths);
    }
    public static function pathUserHome(string ...$paths): ?string
    {
        $osFam = \App\Enums\OsFamily::make();
        $basePath = $osFam->isWindows() ? getenv('USERPROFILE') : ($osFam->isUnix() ? getenv('HOME') : null);
        if ($basePath === null || $basePath === false) return null;
        if (is_string($basePath) && trim($basePath) === '') return null;
        if (is_array($basePath) && count($basePath) === 0) return null;
        $basePath = (is_array($basePath) ? array_values($basePath) : [$basePath])[0];
        return static::pathJoin($basePath, ...$paths);
    }
}
