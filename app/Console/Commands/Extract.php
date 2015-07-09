<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RawData;
use App\Jobs\Extract\ItemGeneric;
use Bus;

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
    protected $description = 'Create queue jobs for extract data from imported items';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Creating queue jobs for extract data from imported items...');

        $items = RawData::all();

        foreach ($items as $item) {
            Bus::dispatch(new ItemGeneric($item->code, $item->lat, $item->lng));
        }

        $this->info('Jobs are successfully queued!');
    }
}
