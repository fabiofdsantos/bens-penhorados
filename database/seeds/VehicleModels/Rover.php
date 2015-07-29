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

class Rover extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Rover')->pluck('id');

        $models = [
            ['name' => '100', 'regex' => '/100/', 'make_id' => $makeId],
            ['name' => '111', 'regex' => '/111/', 'make_id' => $makeId],
            ['name' => '200', 'regex' => '/200/', 'make_id' => $makeId],
            ['name' => '213', 'regex' => '/213/', 'make_id' => $makeId],
            ['name' => '214', 'regex' => '/214/', 'make_id' => $makeId],
            ['name' => '216', 'regex' => '/216/', 'make_id' => $makeId],
            ['name' => '220', 'regex' => '/220/', 'make_id' => $makeId],
            ['name' => '25', 'regex' => '/25/', 'make_id' => $makeId],
            ['name' => '400', 'regex' => '/400/', 'make_id' => $makeId],
            ['name' => '414', 'regex' => '/414/', 'make_id' => $makeId],
            ['name' => '416', 'regex' => '/416/', 'make_id' => $makeId],
            ['name' => '420', 'regex' => '/420/', 'make_id' => $makeId],
            ['name' => '45', 'regex' => '/45/', 'make_id' => $makeId],
            ['name' => '600', 'regex' => '/600/', 'make_id' => $makeId],
            ['name' => '620', 'regex' => '/620/', 'make_id' => $makeId],
            ['name' => '75', 'regex' => '/75/', 'make_id' => $makeId],
            ['name' => '820', 'regex' => '/820/', 'make_id' => $makeId],
            ['name' => 'City Rover', 'regex' => '/city[\pP\s]?rover/i', 'make_id' => $makeId],
            ['name' => 'Streetwise', 'regex' => '/streetwise/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
