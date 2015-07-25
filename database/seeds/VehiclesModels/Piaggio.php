<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Piaggio extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Piaggio')->pluck('id');

        $models = [
            ['name' => 'Porter', 'regex' => '/porter/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
