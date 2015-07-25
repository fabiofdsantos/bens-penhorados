<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class RollsRoyce extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Rolls Royce')->pluck('id');

        $models = [
            ['name' => 'Silver Spirit', 'regex' => '/silver[\pP\s]?spirit/i', 'make_id' => $makeId],
            ['name' => 'Silver Spur', 'regex' => '/silver[\pP\s]?spur/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
