<?php

use LaravelZero\Framework\Application;

//return Application::configure(basePath: dirname(__DIR__))->create();

//return with(
//    Application::configure(basePath: dirname(__DIR__)),
//    static function (ApplicationBuilder $app): LaravelApplication {
//
//    }
//);
//return Application::configure(basePath: dirname(__DIR__))
//    ->create()
//    ->useEnvironmentPath($this->environmentPath);

//return Application::configure(basePath: dirname(__DIR__))->create();

return with(
    Application::configure(basePath: dirname(__DIR__))->create(),
    static function (LaravelApplication $app): LaravelApplication {
        dump('Stage: App Bootstrapping');
        return $app;
    }
);
