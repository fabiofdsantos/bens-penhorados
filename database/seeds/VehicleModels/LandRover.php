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

class LandRover extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Land Rover')->pluck('id');

        $models = [
            ['name' => 'Defender', 'regex' => '/defender/i', 'make_id' => $makeId],
            ['name' => 'Discovery', 'regex' => '/discovery/i', 'make_id' => $makeId],
            ['name' => 'Discovery 2', 'regex' => '/discovery[\pP\s]?2/i', 'make_id' => $makeId],
            ['name' => 'Discovery 3', 'regex' => '/discovery[\pP\s]?3/i', 'make_id' => $makeId],
            ['name' => 'Freelander', 'regex' => '/freelander/i', 'make_id' => $makeId],
            ['name' => 'Freelander 2', 'regex' => '/freelander[\pP\s]?2/i', 'make_id' => $makeId],
            ['name' => 'Range Rover', 'regex' => '/range[\pP\s]?rover/i', 'make_id' => $makeId],
            ['name' => 'Range Rover Evoque', 'regex' => '/range[\pP\s]?rover[\pP\s]?evoque/i', 'make_id' => $makeId],
            ['name' => 'Range Rover Sport', 'regex' => '/range[\pP\s]?rover[\pP\s]?sport/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
