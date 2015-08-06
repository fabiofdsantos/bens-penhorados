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

use App\Jobs\Import\ImportFromMapJob;
use App\Jobs\Import\ImportFromWebsiteJob;
use App\Models\Items\Attributes\District;
use App\Models\Items\Attributes\ItemCategory;
use App\Models\RawData;
use Bus;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

/**
 * This is the import command class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
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

        $mode = $this->choice('From where do you want to import the items?', ['All', 'Map', 'Website'], null, null, false);
        $categories = (string) $this->option('only') ?: null;
        $lastPage = (int) $this->option('last-page') ?: null;

        if ($mode === 'Map' || $mode === 'All') {
            $this->importFromMap();
        } elseif ($mode === 'Website' || $mode === 'All') {
            $this->importFromWebsite($categories, $lastPage);
        }

        $this->info('Jobs are successfully queued!');
    }

    /**
     * Import items from map.
     */
    public function importFromMap()
    {
        $locations = District::lists('code');
        $existingItems = RawData::lists('code');

        Bus::dispatch(new ImportFromMapJob($locations, $existingItems));
    }

    /**
     * Import items from website.
     *
     * @param string|null $categories
     * @param int|null    $lastPage
     */
    public function importFromWebsite($categories, $lastPage)
    {
        if (isset($categories)) {
            $categories = explode(',', $categories);
            $categories = ItemCategory::whereCodeIn($categories)->get();
        } else {
            $categories = ItemCategory::all();
        }

        Bus::dispatch(new ImportFromWebsiteJob($categories, $lastPage));
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
