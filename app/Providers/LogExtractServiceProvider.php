<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

/**
 * This is the log extract service provider class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class LogExtractServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('LogExtract', function () {
            return new Logger('bp_extract', [$this->getMonologHandler()]);
        });
    }

    /**
     * Get the monolog handler.
     *
     * @return StreamHandler
     */
    protected function getMonologHandler()
    {
        $streamHandler = new StreamHandler(storage_path('logs/extract.log'), Logger::DEBUG);

        return $streamHandler->setFormatter(
            new LineFormatter(null, null, null, true)
        );
    }
}
