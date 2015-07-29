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

class Dacia extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Dacia')->pluck('id');

        $models = [
            ['name' => 'Duster', 'regex' => '/duster/i', 'make_id' => $makeId],
            ['name' => 'Lodgy', 'regex' => '/lodgy/i', 'make_id' => $makeId],
            ['name' => 'Logan', 'regex' => '/logan/i', 'make_id' => $makeId],
            ['name' => 'Sandero', 'regex' => '/sandero/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
