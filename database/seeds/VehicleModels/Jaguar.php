<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Jaguar extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Jaguar')->pluck('id');

        $models = [
            ['name' => 'F-Type', 'regex' => '/f[\pP\s]?type/i', 'make_id' => $makeId],
            ['name' => 'MK II', 'regex' => '/mk[\pP\s]?ii/i', 'make_id' => $makeId],
            ['name' => 'S-Type', 'regex' => '/s[\pP\s]?type/i', 'make_id' => $makeId],
            ['name' => 'XF', 'regex' => '/xf/i', 'make_id' => $makeId],
            ['name' => 'XJ', 'regex' => '/xj/i', 'make_id' => $makeId],
            ['name' => 'XJ12', 'regex' => '/xj12/i', 'make_id' => $makeId],
            ['name' => 'XJ6', 'regex' => '/xj6/i', 'make_id' => $makeId],
            ['name' => 'XJ8', 'regex' => '/xj8/i', 'make_id' => $makeId],
            ['name' => 'XJR', 'regex' => '/xjr/i', 'make_id' => $makeId],
            ['name' => 'XJS', 'regex' => '/xjs/i', 'make_id' => $makeId],
            ['name' => 'XK', 'regex' => '/xk/i', 'make_id' => $makeId],
            ['name' => 'XK8', 'regex' => '/xk8/i', 'make_id' => $makeId],
            ['name' => 'XKR', 'regex' => '/xkr/i', 'make_id' => $makeId],
            ['name' => 'X-type', 'regex' => '/x[\pP\s]?type/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
