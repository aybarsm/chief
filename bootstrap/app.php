<?php

use App\Framework\Application;
use Illuminate\Foundation\Configuration\ApplicationBuilder;
use Illuminate\Foundation\Application as LaravelApplication;

//return with(
//    Application::configure(basePath: dirname(__DIR__)),
//    static function (ApplicationBuilder $app): LaravelApplication {
//
//    }
//);
//return Application::configure(basePath: dirname(__DIR__))
//    ->create()
//    ->useEnvironmentPath($this->environmentPath);

return Application::configure(basePath: dirname(__DIR__))->create();
