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

class Subaru extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Subaru')->pluck('id');

        $models = [
            ['name' => 'Forester', 'regex' => '/forester/i', 'make_id' => $makeId],
            ['name' => 'Impreza', 'regex' => '/impreza/i', 'make_id' => $makeId],
            ['name' => 'Legacy', 'regex' => '/legacy/i', 'make_id' => $makeId],
            ['name' => 'Outback', 'regex' => '/outback/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
