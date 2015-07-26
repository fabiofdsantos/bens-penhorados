<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Smart extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Smart')->pluck('id');

        $models = [
            ['name' => 'ForTwo Cabrio', 'regex' => '/fortwo[\pP\s]?cabrio/i', 'make_id' => $makeId],
            ['name' => 'ForTwo Coupé', 'regex' => '/fortwo[\pP\s]?coupe/i', 'make_id' => $makeId],
            ['name' => 'City Cabrio', 'regex' => '/city[\pP\s]?cabrio/i', 'make_id' => $makeId],
            ['name' => 'City Coupé', 'regex' => '/city[\pP\s]?coupe/i', 'make_id' => $makeId],
            ['name' => 'Crossblade', 'regex' => '/crossblade/i', 'make_id' => $makeId],
            ['name' => 'ForFour', 'regex' => '/forfour/i', 'make_id' => $makeId],
            ['name' => 'Roadster Coupé', 'regex' => '/roadster[\pP\s]?coupe/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
