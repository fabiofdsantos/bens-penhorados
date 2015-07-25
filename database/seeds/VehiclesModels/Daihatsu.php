<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Daihatsu extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Daihatsu')->pluck('id');

        $models = [
            ['name' => 'Charade', 'regex' => '/charade/i', 'make_id' => $makeId],
            ['name' => 'Cuore', 'regex' => '/cuore/i', 'make_id' => $makeId],
            ['name' => 'Rocky', 'regex' => '/rocky/i', 'make_id' => $makeId],
            ['name' => 'Sirion', 'regex' => '/sirion/i', 'make_id' => $makeId],
            ['name' => 'Terios', 'regex' => '/terios/i', 'make_id' => $makeId],
            ['name' => 'YRV', 'regex' => '/yrv/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
