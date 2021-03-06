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
        'App\Console\Commands\GenerateSitemapCommand',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    protected function schedule(Schedule $schedule)
    {
        // At 20:00 on Mon, Tue, Wed, Thu and Fri.
        $schedule->command('jobs:import')->cron('00 20 * * 1-5');

        // Once a day
        $schedule->command('generate:sitemap')->daily();
    }
}
