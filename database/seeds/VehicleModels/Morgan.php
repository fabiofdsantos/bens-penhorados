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

class Morgan extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Morgan')->pluck('id');

        $models = [
            ['name' => '4/4', 'regex' => '/4[\pP\s]?4/i', 'make_id' => $makeId],
            ['name' => 'Plus 4', 'regex' => '/plus[\pP\s]?4/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
