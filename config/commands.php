<?php

use App\Framework\Chief;

return [
    'default' => Chief::commandsDefault(),
    'paths' => [
        app_path('Commands')
    ],
    'add' => [
        \Illuminate\Cache\Console\CacheTableCommand::class,
        \Illuminate\Database\Console\WipeCommand::class,
    ],
    'hidden' => [
//        NunoMaduro\LaravelConsoleSummary\SummaryCommand::class,
//        Symfony\Component\Console\Command\DumpCompletionCommand::class,
//        Symfony\Component\Console\Command\HelpCommand::class,
//        Illuminate\Console\Scheduling\ScheduleRunCommand::class,
//        Illuminate\Console\Scheduling\ScheduleListCommand::class,
//        Illuminate\Console\Scheduling\ScheduleFinishCommand::class,
//        Illuminate\Foundation\Console\VendorPublishCommand::class,
//        LaravelZero\Framework\Commands\StubPublishCommand::class,
        App\Commands\Dev\TestMe::class,
    ],
    'remove' => [
        //
    ],
];
