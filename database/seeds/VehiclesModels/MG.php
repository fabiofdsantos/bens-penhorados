<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class MG extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'MG')->pluck('id');

        $models = [
            ['name' => 'TF', 'regex' => '/tf/i', 'make_id' => $makeId],
            ['name' => 'F', 'regex' => '/f/i', 'make_id' => $makeId],
            ['name' => 'MGB', 'regex' => '/mgb/i', 'make_id' => $makeId],
            ['name' => 'ZR', 'regex' => '/zr/i', 'make_id' => $makeId],
            ['name' => 'ZS', 'regex' => '/zs/i', 'make_id' => $makeId],
            ['name' => 'ZT', 'regex' => '/zt/i', 'make_id' => $makeId],
            ['name' => 'ZT-T', 'regex' => '/zt[\pP\s]?t/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
