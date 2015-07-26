<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Chevrolet extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Chevrolet')->pluck('id');

        $models = [
            ['name' => '150', 'regex' => '/150/', 'make_id' => $makeId],
            ['name' => '2500', 'regex' => '/2500/', 'make_id' => $makeId],
            ['name' => 'Aveo', 'regex' => '/aveo/i', 'make_id' => $makeId],
            ['name' => 'Camaro', 'regex' => '/camaro/i', 'make_id' => $makeId],
            ['name' => 'Captiva', 'regex' => '/captiva/i', 'make_id' => $makeId],
            ['name' => 'Corvette C4', 'regex' => '/corvette[\pP\s]?c4/i', 'make_id' => $makeId],
            ['name' => 'Corvette C5', 'regex' => '/corvette[\pP\s]?c5/i', 'make_id' => $makeId],
            ['name' => 'Coupé', 'regex' => '/coup[eéèêẽë]/iu', 'make_id' => $makeId],
            ['name' => 'Cruze', 'regex' => '/cruze/i', 'make_id' => $makeId],
            ['name' => 'Epica', 'regex' => '/epica/i', 'make_id' => $makeId],
            ['name' => 'Lacetti', 'regex' => '/lacetti/i', 'make_id' => $makeId],
            ['name' => 'Lanos', 'regex' => '/lanos/i', 'make_id' => $makeId],
            ['name' => 'Matiz', 'regex' => '/matiz/i', 'make_id' => $makeId],
            ['name' => 'Nexia', 'regex' => '/nexia/i', 'make_id' => $makeId],
            ['name' => 'Nubira', 'regex' => '/nubira/i', 'make_id' => $makeId],
            ['name' => 'Orlando', 'regex' => '/orlando/i', 'make_id' => $makeId],
            ['name' => 'Spark', 'regex' => '/spark/i', 'make_id' => $makeId],
            ['name' => 'SSR', 'regex' => '/ssr/i', 'make_id' => $makeId],
            ['name' => 'Tacuma', 'regex' => '/tacuma/i', 'make_id' => $makeId],
            ['name' => 'Tahoe', 'regex' => '/tahoe/i', 'make_id' => $makeId],
            ['name' => 'Trax', 'regex' => '/trax/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
