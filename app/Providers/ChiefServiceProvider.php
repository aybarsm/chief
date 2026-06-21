<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ChiefServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
        dump('Stage: Register ChiefServiceProvider');
    }

    public function boot(): void
    {
        //
        dump('Stage: Boot ChiefServiceProvider');
    }
}
