<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Bus;

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
    protected $description = 'Create queue jobs for import items from the source';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Creating queue jobs for import items from the source...');

        Bus::dispatch(new \App\Jobs\Import\Map());
        Bus::dispatch(new \App\Jobs\Import\Website());

        $this->info('Jobs are successfully queued!');
    }
}
