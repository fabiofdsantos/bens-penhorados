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

use App\Jobs\Extract\ExtractGenericAttributesJob;
use App\Models\Attributes\Generic\ItemCategory;
use App\Models\RawData;
use Bus;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

/**
 * This is the extract command class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class ExtractCommand extends Command
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
        $categories = $this->option('only');
        $total = $this->option('take');
        $ignoreImages = (boolean) $this->option('ignore-images');

        if (isset($categories)) {
            $categories = explode(',', $categories);
            $catIds = ItemCategory::whereCodeIn($categories)->lists('id');

            if (isset($total)) {
                $items = RawData::whereCategoryIn($catIds)->take((integer) $total)->get();
            } else {
                $items = RawData::whereCategoryIn($catIds)->get();
            }
        } else {
            $items = isset($total) ? RawData::take((integer) $total)->get() : RawData::all();
        }

        if ($items->isEmpty()) {
            return $this->error('There aren\'t any items to be extracted. Run jobs:import command first!');
        }

        $this->info('Creating queue jobs to extract data from imported items...');

        foreach ($items as $item) {
            Bus::dispatch(new ExtractGenericAttributesJob($item->code, $item->category_id, $item->lat, $item->lng, $ignoreImages));
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
