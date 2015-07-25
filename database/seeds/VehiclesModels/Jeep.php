<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Jeep extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Jeep')->pluck('id');

        $models = [
            ['name' => 'Cherokee', 'regex' => '/cherokee/i', 'make_id' => $makeId],
            ['name' => 'Compass', 'regex' => '/compass/i', 'make_id' => $makeId],
            ['name' => 'Grand Cherokee', 'regex' => '/grand[\pP\s]?cherokee/i', 'make_id' => $makeId],
            ['name' => 'Patriot', 'regex' => '/patriot/i', 'make_id' => $makeId],
            ['name' => 'Renegade', 'regex' => '/renegade/i', 'make_id' => $makeId],
            ['name' => 'Willys', 'regex' => '/willys/i', 'make_id' => $makeId],
            ['name' => 'Wrangler', 'regex' => '/wrangler/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
