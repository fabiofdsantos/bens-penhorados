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

use App\Jobs\Import\Map;
use App\Jobs\Import\Website;
use Bus;
use DB;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class ImportCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'jobs:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create queue jobs to import items from the source';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Creating queue jobs to import items from the source...');

        $mode = $this->choice('From where do you want to import the items?', ['All', 'Map', 'Website'], false);

        if ($mode == 'Map') {
            $this->fromMap();
        } elseif ($mode == 'Website') {
            $this->fromWebsite();
        } else {
            $this->fromMap();
            $this->fromWebsite();
        }

        $this->info('Jobs are successfully queued!');
    }

    /**
     * Import items from map.
     */
    public function fromMap()
    {
        $locations = DB::table('locations')->where('parent_id', '=', null)->lists('code');
        $existingItems = DB::table('raw_data')->lists('code');

        Bus::dispatch(new Map($locations, $existingItems));
    }

    /**
     * Import items from website.
     */
    public function fromWebsite()
    {
        $categories = $this->option('only');
        $lastPage = $this->option('last-page');

        if (isset($categories)) {
            $categories = explode(',', $categories);
            $categories = DB::table('item_categories')->whereIn('code', $categories)->get();
        } else {
            $categories = DB::table('item_categories')->get();
        }

        Bus::dispatch(new Website($categories, $lastPage));
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['only', 'o', InputOption::VALUE_OPTIONAL, 'Comma-separated list of categories codes'],
            ['last-page', 'lp', InputOption::VALUE_OPTIONAL, 'Last page to be crawled'],
        ];
    }
}
