<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Abarth extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Abarth')->pluck('id');

        $models = [
            ['name' => '500C', 'regex' => '/500c/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
