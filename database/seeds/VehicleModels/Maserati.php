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

class Maserati extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Maserati')->pluck('id');

        $models = [
            ['name' => '3200', 'regex' => '/3200/', 'make_id' => $makeId],
            ['name' => '422', 'regex' => '/422/', 'make_id' => $makeId],
            ['name' => 'Coupé', 'regex' => '/coupe/i', 'make_id' => $makeId],
            ['name' => 'Ghibli', 'regex' => '/ghibli/i', 'make_id' => $makeId],
            ['name' => 'GranCabrio', 'regex' => '/grancabrio/i', 'make_id' => $makeId],
            ['name' => 'GranSport', 'regex' => '/gransport/i', 'make_id' => $makeId],
            ['name' => 'Quattroporte', 'regex' => '/quattroporte/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
