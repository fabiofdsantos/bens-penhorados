<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Seat extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Seat')->pluck('id');

        $models = [
            ['name' => 'Alhambra', 'regex' => '/alhambra/i', 'make_id' => $makeId],
            ['name' => 'Altea', 'regex' => '/altea/i', 'make_id' => $makeId],
            ['name' => 'Altea XL', 'regex' => '/altea[\pP\s]?xl/i', 'make_id' => $makeId],
            ['name' => 'Arosa', 'regex' => '/arosa/i', 'make_id' => $makeId],
            ['name' => 'Cordoba', 'regex' => '/cordoba/i', 'make_id' => $makeId],
            ['name' => 'Exeo', 'regex' => '/exeo/i', 'make_id' => $makeId],
            ['name' => 'Ibiza', 'regex' => '/ibiza/i', 'make_id' => $makeId],
            ['name' => 'Inca', 'regex' => '/inca/i', 'make_id' => $makeId],
            ['name' => 'Leon', 'regex' => '/leon/i', 'make_id' => $makeId],
            ['name' => 'Marbella', 'regex' => '/marbella/i', 'make_id' => $makeId],
            ['name' => 'Mii', 'regex' => '/mii/i', 'make_id' => $makeId],
            ['name' => 'Toledo', 'regex' => '/toledo/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
