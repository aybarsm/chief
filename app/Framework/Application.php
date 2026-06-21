<?php

namespace App\Framework;
use Illuminate\Foundation\Configuration\ApplicationBuilder;
use LaravelZero\Framework\Application as LaravelZeroApplication;
class Application extends LaravelZeroApplication
{
    public static function configure(?string $basePath = null): ApplicationBuilder
    {
        dump('Stage: Application Configure PRE');
        $builder = parent::configure($basePath);
        dump('Stage: Application Configure POST');
        $app = $builder->create();
        dump('LoadedProviders:', $app->getLoadedProviders());
        return $builder;
    }

    public function create()
    {
        return $this->app;
    }
}
