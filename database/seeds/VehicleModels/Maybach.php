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

class Maybach extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Maybach')->pluck('id');

        $models = [
            ['name' => '57', 'regex' => '/\b57\b/', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
