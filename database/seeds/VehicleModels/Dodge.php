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

class Dodge extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Dodge')->pluck('id');

        $models = [
            ['name' => 'Caliber', 'regex' => '/caliber/i', 'make_id' => $makeId],
            ['name' => 'Durango', 'regex' => '/durango/i', 'make_id' => $makeId],
            ['name' => 'Journey', 'regex' => '/journey/i', 'make_id' => $makeId],
            ['name' => 'Ram', 'regex' => '/ram/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
