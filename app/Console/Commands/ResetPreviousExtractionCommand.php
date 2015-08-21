<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;

/**
 * This is the reset previous extraction command class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class ResetPreviousExtractionCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'reset:prev-extraction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset the previous extraction';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::table('vehicles')->truncate();
        DB::table('properties')->truncate();
        DB::table('items')->truncate();

        DB::table('raw_data')->update(['extracted' => false]);

        $this->info('The previous extraction has been reset successfully!');
    }
}
