<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Iveco extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Iveco')->pluck('id');

        $models = [
            ['name' => '35.12', 'regex' => '/35[\pP\s]?12/i', 'make_id' => $makeId],
            ['name' => 'Daily', 'regex' => '/daily/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
