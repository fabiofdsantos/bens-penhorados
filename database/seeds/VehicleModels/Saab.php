<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Saab extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Saab')->pluck('id');

        $models = [
            ['name' => '900', 'regex' => '/900/', 'make_id' => $makeId],
            ['name' => '9000', 'regex' => '/9000/', 'make_id' => $makeId],
            ['name' => '900 Cabriolet', 'regex' => '/900[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => '9-3', 'regex' => '/9[\pP\s]?3/i', 'make_id' => $makeId],
            ['name' => '9-3 Cabriolet', 'regex' => '/9[\pP\s]?3[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => '9-3X', 'regex' => '/9[\pP\s]?3x/i', 'make_id' => $makeId],
            ['name' => '9-5', 'regex' => '/9[\pP\s]?5/i', 'make_id' => $makeId],
            ['name' => '9-7X', 'regex' => '/9[\pP\s]?7x/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
