<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Lincoln extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Lincoln')->pluck('id');

        $models = [
            ['name' => 'Town Car', 'regex' => '/town[\pP\s]?car/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
