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
            ['name' => '100', 'regex' => '/\b100\b/', 'make_id' => $makeId],
            ['name' => '111', 'regex' => '/\b111\b/', 'make_id' => $makeId],
            ['name' => '200', 'regex' => '/\b200\b/', 'make_id' => $makeId],
            ['name' => '213', 'regex' => '/\b213\b/', 'make_id' => $makeId],
            ['name' => '214', 'regex' => '/\b214\b/', 'make_id' => $makeId],
            ['name' => '216', 'regex' => '/\b216\b/', 'make_id' => $makeId],
            ['name' => '220', 'regex' => '/\b220\b/', 'make_id' => $makeId],
            ['name' => '25', 'regex' => '/\b25\b/', 'make_id' => $makeId],
            ['name' => '400', 'regex' => '/\b400\b/', 'make_id' => $makeId],
            ['name' => '414', 'regex' => '/\b414\b/', 'make_id' => $makeId],
            ['name' => '416', 'regex' => '/\b416\b/', 'make_id' => $makeId],
            ['name' => '420', 'regex' => '/\b420\b/', 'make_id' => $makeId],
            ['name' => '45', 'regex' => '/\b45\b/', 'make_id' => $makeId],
            ['name' => '600', 'regex' => '/\b600\b/', 'make_id' => $makeId],
            ['name' => '620', 'regex' => '/\b620\b/', 'make_id' => $makeId],
            ['name' => '75', 'regex' => '/\b75\b/', 'make_id' => $makeId],
            ['name' => '820', 'regex' => '/\b820\b/', 'make_id' => $makeId],
            ['name' => 'City Rover', 'regex' => '/city[\pP\s]?rover/i', 'make_id' => $makeId],
            ['name' => 'Streetwise', 'regex' => '/streetwise/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
