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

class Mazda extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Mazda')->pluck('id');

        $models = [
            ['name' => '121', 'regex' => '/121/', 'make_id' => $makeId],
            ['name' => '2', 'regex' => '/2/', 'make_id' => $makeId],
            ['name' => '3', 'regex' => '/3/', 'make_id' => $makeId],
            ['name' => '323', 'regex' => '/323/', 'make_id' => $makeId],
            ['name' => '323F', 'regex' => '/323f/i', 'make_id' => $makeId],
            ['name' => '5', 'regex' => '/5/', 'make_id' => $makeId],
            ['name' => '6', 'regex' => '/6/', 'make_id' => $makeId],
            ['name' => '626', 'regex' => '/626/', 'make_id' => $makeId],
            ['name' => 'BT-50', 'regex' => '/bt[\pP\s]?50/i', 'make_id' => $makeId],
            ['name' => 'CX-3', 'regex' => '/cx[\pP\s]?3/i', 'make_id' => $makeId],
            ['name' => 'CX-5', 'regex' => '/cx[\pP\s]?5/i', 'make_id' => $makeId],
            ['name' => 'CX-7', 'regex' => '/cx[\pP\s]?7/i', 'make_id' => $makeId],
            ['name' => 'Demio', 'regex' => '/demio/i', 'make_id' => $makeId],
            ['name' => 'MPV', 'regex' => '/mpv/i', 'make_id' => $makeId],
            ['name' => 'MX3', 'regex' => '/mx3/i', 'make_id' => $makeId],
            ['name' => 'MX5', 'regex' => '/mx5/i', 'make_id' => $makeId],
            ['name' => 'MX6', 'regex' => '/mx6/i', 'make_id' => $makeId],
            ['name' => 'Premacy', 'regex' => '/premacy/i', 'make_id' => $makeId],
            ['name' => 'RX7', 'regex' => '/rx7/i', 'make_id' => $makeId],
            ['name' => 'RX8', 'regex' => '/rx8/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
