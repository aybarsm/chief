<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
        dump('Stage: Register AppServiceProvider');
    }

    public function boot(): void
    {
        //
        dump('Stage: Boot AppServiceProvider');
    }
}
