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
        $ignoreImages = $this->option('ignore-images');

        if (isset($categories)) {
            $categories = explode(',', $categories);
            $categoriesIds = DB::table('item_categories')->whereIn('code', $categories)->lists('id');

            if (isset($maxResults)) {
                $items = RawData::whereIn('category_id', $categoriesIds)->take($maxResults)->get();
            } else {
                $items = RawData::whereIn('category_id', $categoriesIds)->get();
            }
        } else {
            $items = isset($maxResults) ? RawData::take($maxResults)->get() : RawData::all();
        }

        foreach ($items as $item) {
            Bus::dispatch(new ItemGeneric($item->code, $item->category_id, $item->lat, $item->lng, $ignoreImages));
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
            ['ignore-images', 'ni', InputOption::VALUE_NONE, 'If set, images won\'t be extracted'],
        ];
    }
}
