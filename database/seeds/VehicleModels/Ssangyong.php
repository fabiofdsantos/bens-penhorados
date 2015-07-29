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

class Ssangyong extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Ssangyong')->pluck('id');

        $models = [
            ['name' => 'Actyon', 'regex' => '/actyon/i', 'make_id' => $makeId],
            ['name' => 'Korando', 'regex' => '/korando/i', 'make_id' => $makeId],
            ['name' => 'Musso', 'regex' => '/musso/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
