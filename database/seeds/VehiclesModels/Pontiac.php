<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Pontiac extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Pontiac')->pluck('id');

        $models = [
            ['name' => 'Firebird', 'regex' => '/firebird/i', 'make_id' => $makeId],
            ['name' => 'Sunbird', 'regex' => '/sunbird/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
