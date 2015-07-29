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

class Bentley extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Bentley')->pluck('id');

        $models = [
            ['name' => 'Arnage', 'regex' => '/arnage/i', 'make_id' => $makeId],
            ['name' => 'Continental', 'regex' => '/continental/i', 'make_id' => $makeId],
            ['name' => 'Continental Flying Spur', 'regex' => '/continental[\pP\s]?flying[\pP\s]?spur/i', 'make_id' => $makeId],
            ['name' => 'Continental GT', 'regex' => '/continental[\pP\s]?gt/i', 'make_id' => $makeId],
            ['name' => 'Eight', 'regex' => '/eight/i', 'make_id' => $makeId],
            ['name' => 'Turbo R', 'regex' => '/turbo[\pP\s]?r/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
