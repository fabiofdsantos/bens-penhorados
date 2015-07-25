<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Lamborghini extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Lamborghini')->pluck('id');

        $models = [
            ['name' => 'Gallardo', 'regex' => '/gallardo/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
