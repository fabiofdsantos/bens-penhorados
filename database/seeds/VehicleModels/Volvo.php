<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Volvo extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Volvo')->pluck('id');

        $models = [
            ['name' => '140', 'regex' => '/\b140\b/', 'make_id' => $makeId],
            ['name' => '164', 'regex' => '/\b164\b/', 'make_id' => $makeId],
            ['name' => '240', 'regex' => '/\b240\b/', 'make_id' => $makeId],
            ['name' => '340', 'regex' => '/\b340\b/', 'make_id' => $makeId],
            ['name' => '440', 'regex' => '/\b440\b/', 'make_id' => $makeId],
            ['name' => '460', 'regex' => '/\b460\b/', 'make_id' => $makeId],
            ['name' => '480', 'regex' => '/\b480\b/', 'make_id' => $makeId],
            ['name' => '740', 'regex' => '/\b740\b/', 'make_id' => $makeId],
            ['name' => '850', 'regex' => '/\b850\b/', 'make_id' => $makeId],
            ['name' => '940', 'regex' => '/\b940\b/', 'make_id' => $makeId],
            ['name' => '960', 'regex' => '/\b960\b/', 'make_id' => $makeId],
            ['name' => 'C30', 'regex' => '/c30/i', 'make_id' => $makeId],
            ['name' => 'C70', 'regex' => '/c70/i', 'make_id' => $makeId],
            ['name' => 'S40', 'regex' => '/s40/i', 'make_id' => $makeId],
            ['name' => 'S60', 'regex' => '/s60/i', 'make_id' => $makeId],
            ['name' => 'S70', 'regex' => '/s70/i', 'make_id' => $makeId],
            ['name' => 'S80', 'regex' => '/s80/i', 'make_id' => $makeId],
            ['name' => 'V40', 'regex' => '/v40/i', 'make_id' => $makeId],
            ['name' => 'V40 CC', 'regex' => '/v40[\pP\s]?cc/i', 'make_id' => $makeId],
            ['name' => 'V50', 'regex' => '/v50/i', 'make_id' => $makeId],
            ['name' => 'V60', 'regex' => '/v60/i', 'make_id' => $makeId],
            ['name' => 'V60 CC', 'regex' => '/v60[\pP\s]?cc/i', 'make_id' => $makeId],
            ['name' => 'V70', 'regex' => '/v70/i', 'make_id' => $makeId],
            ['name' => 'XC60', 'regex' => '/xc60/i', 'make_id' => $makeId],
            ['name' => 'XC70', 'regex' => '/xc70/i', 'make_id' => $makeId],
            ['name' => 'XC90', 'regex' => '/xc90/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
