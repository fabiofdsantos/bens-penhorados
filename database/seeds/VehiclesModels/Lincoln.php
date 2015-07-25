<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Lincoln extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Lincoln')->pluck('id');

        $models = [
            ['name' => 'Town Car', 'regex' => '/town[\pP\s]?car/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
