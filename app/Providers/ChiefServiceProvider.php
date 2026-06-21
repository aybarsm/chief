<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Framework\Chief;
class ChiefServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $migrationsPath = chief_path('database', 'migrations');
        if (is_dir($migrationsPath)) {
            $this->loadMigrationsFrom($migrationsPath);
        }
    }
}
