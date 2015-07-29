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

class Jeep extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Jeep')->pluck('id');

        $models = [
            ['name' => 'Cherokee', 'regex' => '/cherokee/i', 'make_id' => $makeId],
            ['name' => 'Compass', 'regex' => '/compass/i', 'make_id' => $makeId],
            ['name' => 'Grand Cherokee', 'regex' => '/grand[\pP\s]?cherokee/i', 'make_id' => $makeId],
            ['name' => 'Patriot', 'regex' => '/patriot/i', 'make_id' => $makeId],
            ['name' => 'Renegade', 'regex' => '/renegade/i', 'make_id' => $makeId],
            ['name' => 'Willys', 'regex' => '/willys/i', 'make_id' => $makeId],
            ['name' => 'Wrangler', 'regex' => '/wrangler/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
