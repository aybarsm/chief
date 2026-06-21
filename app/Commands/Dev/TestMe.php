<?php

namespace App\Commands\Dev;

use App\Framework\Console\Command;
use Illuminate\Console\Scheduling\Schedule;

class TestMe extends Command
{
    protected $signature = 'dev:test-me';

    protected $description = 'Command description';

    public function handle(): void
    {
//        $path = '/Users/aybarsm/.chief/storage/app/private';
        $path = '/Users/aybarsm/.chief/falan/filan/saddsad';
        $file = new \App\Support\SplFileInfo(filename: $path, isDirectory: true, mode: 0755);
//        File::ensureDirectoryExists($file);
        dump($file->ensureExists());
//        dump($file->getPerms() & 0777);
//        dump(0777 - umask());
//        dump(0644);
//        dump(printf( "%s\n", octdec($file->getPerms())));
//        dump((int) substr(sprintf('%o', $file->getPerms()), -4));
//        dump(Chief::directories());
//        dump(resource_path('views'));
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
