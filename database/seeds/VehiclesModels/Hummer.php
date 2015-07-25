<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Hummer extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Hummer')->pluck('id');

        $models = [
            ['name' => 'H2', 'regex' => '/h2/i', 'make_id' => $makeId],
            ['name' => 'H3', 'regex' => '/h3/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
