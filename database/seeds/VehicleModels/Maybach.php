<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Maybach extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Maybach')->pluck('id');

        $models = [
            ['name' => '57', 'regex' => '/57/', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
