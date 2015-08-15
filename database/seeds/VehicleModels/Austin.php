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

class Austin extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Austin')->pluck('id');

        $models = [
            ['name' => '1300', 'regex' => '/\b1300\b/', 'make_id' => $makeId],
            ['name' => 'Metro', 'regex' => '/metro/i', 'make_id' => $makeId],
            ['name' => 'Mini', 'regex' => '/mini/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
