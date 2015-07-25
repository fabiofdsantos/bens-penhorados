<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Cadillac extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Cadillac')->pluck('id');

        $models = [
            ['name' => 'Escalade', 'regex' => '/escalade/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
