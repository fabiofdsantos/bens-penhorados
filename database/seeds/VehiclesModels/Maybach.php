<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Maybach extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Maybach')->pluck('id');

        $models = [
            ['name' => '57', 'regex' => '/57/', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
