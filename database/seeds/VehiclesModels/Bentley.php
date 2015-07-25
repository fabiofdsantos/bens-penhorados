<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Bentley extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Bentley')->pluck('id');

        $models = [
            ['name' => 'Arnage', 'regex' => '/arnage/i', 'make_id' => $makeId],
            ['name' => 'Continental', 'regex' => '/continental/i', 'make_id' => $makeId],
            ['name' => 'Continental Flying Spur', 'regex' => '/continental[\pP\s]?flying[\pP\s]?spur/i', 'make_id' => $makeId],
            ['name' => 'Continental GT', 'regex' => '/continental[\pP\s]?gt/i', 'make_id' => $makeId],
            ['name' => 'Eight', 'regex' => '/eight/i', 'make_id' => $makeId],
            ['name' => 'Turbo R', 'regex' => '/turbo[\pP\s]?r/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
