<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Lada extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Lada')->pluck('id');

        $models = [
            ['name' => '110', 'regex' => '/110/', 'make_id' => $makeId],
            ['name' => 'Niva', 'regex' => '/niva/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
