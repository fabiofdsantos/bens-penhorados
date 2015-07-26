<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Piaggio extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Piaggio')->pluck('id');

        $models = [
            ['name' => 'Porter', 'regex' => '/porter/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
