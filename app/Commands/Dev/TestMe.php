<?php

namespace App\Commands\Dev;

use App\Command;
use Illuminate\Console\Scheduling\Schedule;

class TestMe extends Command
{
    protected $signature = 'dev:test-me';

    protected $description = 'Command description';

    public function handle()
    {
        //
    }

    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
