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

class RollsRoyce extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Rolls Royce')->pluck('id');

        $models = [
            ['name' => 'Silver Spirit', 'regex' => '/silver[\pP\s]?spirit/i', 'make_id' => $makeId],
            ['name' => 'Silver Spur', 'regex' => '/silver[\pP\s]?spur/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
