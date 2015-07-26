<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Pontiac extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Pontiac')->pluck('id');

        $models = [
            ['name' => 'Firebird', 'regex' => '/firebird/i', 'make_id' => $makeId],
            ['name' => 'Sunbird', 'regex' => '/sunbird/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
