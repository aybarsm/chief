<?php

namespace App\Framework;

use App\Support\Filesystem;
class Chief
{
    public static function directories(): array
    {
        return [
            'main' => static::path(),
            'share' => static::pathShare(),
            'app' => static::pathApp(),
            'storage' => static::pathStorage(),
            'storage.private' => static::pathStoragePrivate(),
            'storage.public' => static::pathStoragePublic(),
            'framework' => static::pathFramework(),
            'cache' => static::pathCache(),
            'cache.data' => static::pathCache('data'),
            'database' => static::pathDatabase(),
            'database.migrations' => static::pathDatabase('migrations'),
            'views' => static::pathViews(),
        ];
    }
    public static function path(string ...$paths): ?string
    {
        return Filesystem::pathUserHome('.chief', ...$paths);
    }

    public static function pathShare(string ...$paths): ?string
    {
        return Filesystem::pathUserHome('.local', 'share', 'chief', ...$paths);
    }

    public static function pathApp(string ...$paths): ?string
    {
        return static::path('app', ...$paths);
    }

    public static function pathFramework(string ...$paths): ?string
    {
        return static::pathStorage('framework', ...$paths);
    }

    public static function pathCache(string ...$paths): ?string
    {
        return static::pathFramework('cache', ...$paths);
    }

    public static function pathStorage(string ...$paths): ?string
    {
        return static::path('storage', ...$paths);
    }

    public static function pathStoragePrivate(string ...$paths): ?string
    {
        return static::pathStorage('app', 'private', ...$paths);
    }

    public static function pathStoragePublic(string ...$paths): ?string
    {
        return static::pathShare('storage', 'app', 'public', ...$paths);
    }

    public static function pathDatabase(string ...$paths): ?string
    {
        return static::path('database', ...$paths);
    }

    public static function pathLogs(string ...$paths): ?string
    {
        return static::path('logs', ...$paths);
    }

    public static function pathViews(string ...$paths): ?string
    {
        return static::path('views');
    }

    public static function makeApp(?string $basePath = null): Application
    {
        $chiefPath = static::path();

        throw_if(
            $chiefPath === null,
            \App\Exceptions\ChiefException::class,
            'Could not determine user home directory to set chief base path.',
        );

        $storagePath = static::pathStorage();
        if (! is_dir($storagePath)) {
            mkdir(
                directory: $storagePath,
                permissions: 0750,
                recursive: true
            );
        }

        $app = Application::configure($basePath)->create();
        $app->useEnvironmentPath($chiefPath);
        $app->useStoragePath($storagePath);

        return $app;
    }

    public static function commandsDefault(): string
    {
        return \NunoMaduro\LaravelConsoleSummary\SummaryCommand::class;
    }

//    public static function commandsPaths(): array
//    {
//        $ret = [
//            app_path('Commands')
//        ];
//
//
//    }
}
