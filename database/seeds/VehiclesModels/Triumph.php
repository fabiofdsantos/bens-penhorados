<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Triumph extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Triumph')->pluck('id');

        $models = [
            ['name' => 'Spitfire', 'regex' => '/spitfire/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
