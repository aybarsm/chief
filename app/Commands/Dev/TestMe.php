<?php

namespace App\Commands\Dev;

use App\Framework\Chief;
use App\Framework\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class TestMe extends Command
{
    protected $signature = 'dev:test-me';

    protected $description = 'Command description';

    public function handle(): void
    {
        dump(Chief::directories());
//        File::ensureDirectoryExists(base_path());
//        Log::warning('deneme');
//        $app = app();
//        dump(get_class($app));
//        Cache::put('test-cache', 'falan filan');
//        File::ensureDirectoryExists(base_path());
//        dump([
////            'cache' => Cache::get('test-cache'),
////            'envFilePath' => App::environmentFilePath(),
////            'public_path' => public_path(),
////            'storage_path' => storage_path(),
////            'ALL' => $_ENV,
////            'get' => [
////                'HOME' => env('HOME'),
////            ],
//        ]);
    }

    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
