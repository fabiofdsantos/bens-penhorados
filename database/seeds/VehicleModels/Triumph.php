<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Triumph extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Triumph')->pluck('id');

        $models = [
            ['name' => 'Spitfire', 'regex' => '/spitfire/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
