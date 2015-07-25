<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Lexus extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Lexus')->pluck('id');

        $models = [
            ['name' => 'CT200h', 'regex' => '/ct200h/i', 'make_id' => $makeId],
            ['name' => 'GS300', 'regex' => '/gs300/i', 'make_id' => $makeId],
            ['name' => 'IS200', 'regex' => '/is200/i', 'make_id' => $makeId],
            ['name' => 'IS200d', 'regex' => '/is200d/i', 'make_id' => $makeId],
            ['name' => 'IS220d', 'regex' => '/is220d/i', 'make_id' => $makeId],
            ['name' => 'IS250', 'regex' => '/is250/i', 'make_id' => $makeId],
            ['name' => 'IS300h', 'regex' => '/is300h/i', 'make_id' => $makeId],
            ['name' => 'NX300h', 'regex' => '/nx300h/i', 'make_id' => $makeId],
            ['name' => 'RX300', 'regex' => '/rx300/i', 'make_id' => $makeId],
            ['name' => 'RX400h', 'regex' => '/rx400h/i', 'make_id' => $makeId],
            ['name' => 'RX450h', 'regex' => '/rx450h/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
