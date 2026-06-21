<?php

namespace App\Framework;

use LaravelZero\Framework\Application as LaravelZeroApplication;
class Application extends LaravelZeroApplication
{
    public static function init(?string $basePath = null): Application
    {
        $chiefPath = chief_path();

        throw_if(
            $chiefPath === null,
            \App\Exceptions\ChiefException::class,
            'Could not determine user home directory to set chief base path.',
        );

        $storagePath = chief_path('storage');
        if (! is_dir($storagePath)) {
            mkdir(
                directory: chief_path('storage'),
                permissions: 0750,
                recursive: true
            );
        }

        $app = Application::configure($basePath)->create();
        $app->useEnvironmentPath($chiefPath);
        $app->useStoragePath($storagePath);

        return $app;
    }

    public static function isPhar(): bool
    {
        return \Phar::running(false);
    }
}
