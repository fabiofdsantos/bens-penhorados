<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Morgan extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Morgan')->pluck('id');

        $models = [
            ['name' => '4/4', 'regex' => '/4[\pP\s]?4/i', 'make_id' => $makeId],
            ['name' => 'Plus 4', 'regex' => '/plus[\pP\s]?4/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
