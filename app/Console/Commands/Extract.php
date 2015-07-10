<?php

namespace App\Console\Commands;

use App\Jobs\Extract\ItemGeneric;
use App\Models\RawData;
use Bus;
use DB;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class Extract extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'jobs:extract';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create queue jobs to extract data from imported items';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Creating queue jobs to extract data from imported items...');

        $categories = $this->option('only');
        $maxResults = $this->option('take');

        if (isset($categories)) {
            $categories = explode(',', $categories);
            $categories_ids = DB::table('raw_data_categories')->whereIn('code', $categories)->lists('id');

            if (isset($maxResults)) {
                $items = RawData::whereIn('category_id', $categories_ids)->take($maxResults)->get();
            } else {
                $items = RawData::whereIn('category_id', $categories_ids)->get();
            }
        } else {
            $items = isset($maxResults) ? RawData::take($maxResults)->get() : RawData::all();
        }

        foreach ($items as $item) {
            Bus::dispatch(new ItemGeneric($item->code, $item->lat, $item->lng));
        }

        $this->info('Jobs are successfully queued!');
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
            ['take', 't', InputOption::VALUE_OPTIONAL, 'Total of items'],
        ];
    }
}
