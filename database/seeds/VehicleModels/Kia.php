<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Kia extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Kia')->pluck('id');

        $models = [
            ['name' => 'Bongo', 'regex' => '/bongo/i', 'make_id' => $makeId],
            ['name' => 'Carens', 'regex' => '/carens/i', 'make_id' => $makeId],
            ['name' => 'Carnival', 'regex' => '/carnival/i', 'make_id' => $makeId],
            ['name' => 'Cee\'d', 'regex' => '/cee[\pP\s]?[\pP\s]?d/i', 'make_id' => $makeId],
            ['name' => 'Cerato', 'regex' => '/cerato/i', 'make_id' => $makeId],
            ['name' => 'Clarus', 'regex' => '/clarus/i', 'make_id' => $makeId],
            ['name' => 'Magentis', 'regex' => '/magentis/i', 'make_id' => $makeId],
            ['name' => 'Optima', 'regex' => '/optima/i', 'make_id' => $makeId],
            ['name' => 'Picanto', 'regex' => '/picanto/i', 'make_id' => $makeId],
            ['name' => 'Rio', 'regex' => '/rio/i', 'make_id' => $makeId],
            ['name' => 'Sephia', 'regex' => '/sephia/i', 'make_id' => $makeId],
            ['name' => 'Shuma', 'regex' => '/shuma/i', 'make_id' => $makeId],
            ['name' => 'Sorento', 'regex' => '/sorento/i', 'make_id' => $makeId],
            ['name' => 'Soul', 'regex' => '/soul/i', 'make_id' => $makeId],
            ['name' => 'Sportage', 'regex' => '/sportage/i', 'make_id' => $makeId],
            ['name' => 'Venga', 'regex' => '/venga/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
