<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Bus;
use DB;

class Import extends Command
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
        Bus::dispatch(new \App\Jobs\Import\Map());
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
            $categories = DB::table('raw_data_categories')->whereIn('code', $categories)->get();
        } else {
            $categories = DB::table('raw_data_categories')->get();
        }

        Bus::dispatch(new \App\Jobs\Import\Website($categories, $lastPage));
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
