<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Facade;
use Laravel\Lumen\Testing\TestCase;

/**
 * This is the abstract test case class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
abstract class AbstractTestCase extends TestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        return $app;
    }

    public function setUp()
    {
        parent::setUp();

        # It was fixed on v5.1
        Facade::clearResolvedInstances();

        $this->createApplication();
        $this->artisanMigrateRefresh();
    }

    protected function artisanMigrateRefresh()
    {
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }
}
