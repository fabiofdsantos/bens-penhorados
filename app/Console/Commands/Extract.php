<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
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
    protected $description = 'Create queue jobs for extract data from raw data';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Creating queue jobs for extract data from raw data...');

        Bus::dispatch(new \App\Jobs\Extract\RawData());
        Bus::dispatch(new \App\Jobs\Import\CreateItemGeneric());

        $this->info('Jobs are successfully queued!');
    }
}
