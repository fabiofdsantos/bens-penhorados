<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Corvette extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Corvette')->pluck('id');

        $models = [
            ['name' => 'C6', 'regex' => '/c6/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
