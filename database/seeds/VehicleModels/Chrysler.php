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

class Chrysler extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Chrysler')->pluck('id');

        $models = [
            ['name' => '300C', 'regex' => '/300c/i', 'make_id' => $makeId],
            ['name' => '300M', 'regex' => '/300m/i', 'make_id' => $makeId],
            ['name' => 'Crossfire', 'regex' => '/crossfire/i', 'make_id' => $makeId],
            ['name' => 'Grand Voyager', 'regex' => '/grand[\pP\s]?voyager/i', 'make_id' => $makeId],
            ['name' => 'Neon', 'regex' => '/neon/i', 'make_id' => $makeId],
            ['name' => 'PT Cruiser', 'regex' => '/pt[\pP\s]?cruiser/i', 'make_id' => $makeId],
            ['name' => 'Sebring', 'regex' => '/sebring/i', 'make_id' => $makeId],
            ['name' => 'Sebring Cabriolet', 'regex' => '/sebring[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => 'Stratus', 'regex' => '/stratus/i', 'make_id' => $makeId],
            ['name' => 'Voyager', 'regex' => '/voyager/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
