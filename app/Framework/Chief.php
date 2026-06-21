<?php

namespace App\Framework;

use App\Exceptions\ChiefException;
use App\Support\Filesystem;
use App\Support\SplFileInfo;
class Chief
{
    public static function initFilesystem(): true
    {
        foreach(static::filesystem() as $entry) {
            /** @var SplFileInfo $entry */
            $result = $entry->ensureExists(perms: true);
            throw_if(
                $result === false,
                ChiefException::class,
                sprintf('Failed to create: %s', $entry->getPathName())
            );
        }

        return true;
    }
    public static function filesystem(): array
    {
        return [
            new SplFileInfo(static::path(), true, 0750),
            new SplFileInfo(static::pathShare(), true, 0755),
            new SplFileInfo(static::pathStorage(), true, 0750),
            new SplFileInfo(static::pathStorage('app'), true, 0750),
            new SplFileInfo(static::pathStoragePrivate(), true, 0750),
            new SplFileInfo(static::pathStoragePublic(), true, 0755),
            new SplFileInfo(static::pathDatabase(), true, 0750),
            new SplFileInfo(static::pathDatabase('migrations'), true, 0750),
            new SplFileInfo(static::pathFramework(), true, 0750),
            new SplFileInfo(static::pathCache(), true, 0750),
            new SplFileInfo(static::pathCache('data'), true, 0750),
            new SplFileInfo(static::pathResources(), true, 0750),
            new SplFileInfo(static::pathViews(), true, 0750),
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

    public static function pathResources(string ...$paths): ?string
    {
        return static::path('resources', ...$paths);
    }

    public static function pathViews(string ...$paths): ?string
    {
        return static::pathResources('views');
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
