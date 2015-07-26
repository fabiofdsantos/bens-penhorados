<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Tata extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Tata')->pluck('id');

        $models = [
            ['name' => 'Indica', 'regex' => '/indica/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
