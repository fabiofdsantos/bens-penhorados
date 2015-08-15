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

class Ferrari extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Ferrari')->pluck('id');

        $models = [
            ['name' => '348', 'regex' => '/\b348\b/', 'make_id' => $makeId],
            ['name' => '360', 'regex' => '/\b360\b/', 'make_id' => $makeId],
            ['name' => '458', 'regex' => '/\b458\b/', 'make_id' => $makeId],
            ['name' => '575', 'regex' => '/\b575\b/', 'make_id' => $makeId],
            ['name' => '612', 'regex' => '/\b612\b/', 'make_id' => $makeId],
            ['name' => 'California', 'regex' => '/california/i', 'make_id' => $makeId],
            ['name' => 'F355', 'regex' => '/f355/i', 'make_id' => $makeId],
            ['name' => 'F430', 'regex' => '/f430/i', 'make_id' => $makeId],
            ['name' => 'FF', 'regex' => '/ff/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
