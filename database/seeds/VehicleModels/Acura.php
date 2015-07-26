<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Acura extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Acura')->pluck('id');

        $models = [
            ['name' => 'EL', 'regex' => '/el/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
