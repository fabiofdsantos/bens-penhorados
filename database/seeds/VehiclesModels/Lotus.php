<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Lotus extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Lotus')->pluck('id');

        $models = [
            ['name' => 'Elan', 'regex' => '/elan/i', 'make_id' => $makeId],
            ['name' => 'Elise', 'regex' => '/elise/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
