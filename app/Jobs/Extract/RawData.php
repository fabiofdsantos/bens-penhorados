<?php namespace App\Jobs\Extract;

use App\Jobs\Job;
use Bus;
use DB;

/**
 * Description here...
 */
class RawData extends Job
{
    protected $folder;
    protected $extension;

    public function __construct()
    {
        $this->folder = 'rawdata/';
        $this->extension = '.raw';
    }

    public function handle()
    {
        $items = DB::table('raw_data')->select('code', 'lat', 'lng')->get();

        foreach ($items as $item) {
            $filePath = $this->folder.$item->code.$this->extension;
            Bus::dispatch(new RawDataExtended($item->code, $filePath, $item->lat, $item->lng));
        }
    }
}
