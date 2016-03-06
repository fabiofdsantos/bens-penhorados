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

use App\Models\Items\Item;
use App\Models\RawData;
use Illuminate\Console\Command;
use Storage;

/**
 * This is the clean raw data command class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class CleanRawDataCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'clean:rawdata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean raw data';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $inactiveItems = Item::inactive()->lists('code')->all();

        if (empty($inactiveItems)) {
            return $this->error('There aren\'t any inactive items.');
        }

        self::cleanDatabase($inactiveItems);
        self::cleanRawFolder($inactiveItems);

        $this->info('Raw data has been cleaned successfully!');
    }

    /**
     * Delete certain entries in database.
     *
     * @param array $codes
     *
     * @return void
     */
    private static function cleanDatabase($codes)
    {
        RawData::whereIn('code', $codes)->delete();
    }

    /**
     * Delete certain files in raw data folders.
     *
     * @param array $codes
     *
     * @return void
     */
    private static function cleanRawFolder($codes)
    {
        $folder = env('BP_RAW_FOLDER', 'rawdata/');
        $bk_folder = env('BP_RAW_OLD_FOLDER', 'rawdata/old/');
        $ext = env('BP_RAW_FILE_EXT', '.html.part');

        foreach ($codes as $code) {
            $fileCurrent = $folder.$code.$ext;
            $fileBackup = $bk_folder.$code.$ext;

            if (Storage::exists($fileCurrent)) {
                Storage::delete($fileCurrent);
            }

            if (Storage::exists($fileBackup)) {
                Storage::delete($fileBackup);
            }
        }
    }
}
