<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Maserati extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Maserati')->pluck('id');

        $models = [
            ['name' => '3200', 'regex' => '/3200/', 'make_id' => $makeId],
            ['name' => '422', 'regex' => '/422/', 'make_id' => $makeId],
            ['name' => 'Coupé', 'regex' => '/coup[eéèêẽë]/iu', 'make_id' => $makeId],
            ['name' => 'Ghibli', 'regex' => '/ghibli/i', 'make_id' => $makeId],
            ['name' => 'GranCabrio', 'regex' => '/grancabrio/i', 'make_id' => $makeId],
            ['name' => 'GranSport', 'regex' => '/gransport/i', 'make_id' => $makeId],
            ['name' => 'Quattroporte', 'regex' => '/quattroporte/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
