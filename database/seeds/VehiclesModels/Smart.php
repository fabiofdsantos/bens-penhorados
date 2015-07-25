<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Smart extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Smart')->pluck('id');

        $models = [
            ['name' => 'ForTwo Cabrio', 'regex' => '/fortwo[\pP\s]?cabrio/i', 'make_id' => $makeId],
            ['name' => 'ForTwo Coupé', 'regex' => '/fortwo[\pP\s]?coup[eéèêẽë]/iu', 'make_id' => $makeId],
            ['name' => 'City Cabrio', 'regex' => '/city[\pP\s]?cabrio/i', 'make_id' => $makeId],
            ['name' => 'City Coupé', 'regex' => '/city[\pP\s]?coup[eéèêẽë]/iu', 'make_id' => $makeId],
            ['name' => 'Crossblade', 'regex' => '/crossblade/i', 'make_id' => $makeId],
            ['name' => 'ForFour', 'regex' => '/forfour/i', 'make_id' => $makeId],
            ['name' => 'Roadster Coupé', 'regex' => '/roadster[\pP\s]?coup[eéèêẽë]/iu', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
