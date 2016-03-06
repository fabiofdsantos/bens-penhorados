<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\ImportCommand',
        'App\Console\Commands\ExtractCommand',
        'App\Console\Commands\ResetPreviousExtractionCommand',
        'App\Console\Commands\CleanRawDataCommand',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('jobs:import')
            ->cron('* 21 * * 1-5');

        $schedule->command('jobs:import --last-page=1')
            ->cron('* 10,11,12,13,14,15,16,17,18 * * 1-5');
    }
}
