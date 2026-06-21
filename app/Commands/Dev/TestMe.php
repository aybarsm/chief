<?php

namespace App\Commands\Dev;

use App\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Env;

class TestMe extends Command
{
    protected $signature = 'dev:test-me';

    protected $description = 'Command description';

    public function handle(): void
    {
        dump([
            'ALL' => $_ENV,
            'get' => [
                'HOME' => env('HOME'),
            ],
        ]);
    }

    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
