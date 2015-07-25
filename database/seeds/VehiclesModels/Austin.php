<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Austin extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Austin')->pluck('id');

        $models = [
            ['name' => '1300', 'regex' => '/1300/', 'make_id' => $makeId],
            ['name' => 'Metro', 'regex' => '/metro/i', 'make_id' => $makeId],
            ['name' => 'Mini', 'regex' => '/mini/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
