<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Ferrari extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Ferrari')->pluck('id');

        $models = [
            ['name' => '348', 'regex' => '/348/', 'make_id' => $makeId],
            ['name' => '360', 'regex' => '/360/', 'make_id' => $makeId],
            ['name' => '458', 'regex' => '/458/', 'make_id' => $makeId],
            ['name' => '575', 'regex' => '/575/', 'make_id' => $makeId],
            ['name' => '612', 'regex' => '/612/', 'make_id' => $makeId],
            ['name' => 'California', 'regex' => '/california/i', 'make_id' => $makeId],
            ['name' => 'F355', 'regex' => '/f355/i', 'make_id' => $makeId],
            ['name' => 'F430', 'regex' => '/f430/i', 'make_id' => $makeId],
            ['name' => 'FF', 'regex' => '/ff/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
