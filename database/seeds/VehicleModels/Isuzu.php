<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Isuzu extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Isuzu')->pluck('id');

        $models = [
            ['name' => 'D-Max', 'regex' => '/d[\pP\s]?max/i', 'make_id' => $makeId],
            ['name' => 'Trooper', 'regex' => '/trooper/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
