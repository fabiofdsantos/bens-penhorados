<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Ford extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Ford')->pluck('id');

        $models = [
            ['name' => '300', 'regex' => '/300/', 'make_id' => $makeId],
            ['name' => 'B-MAX', 'regex' => '/b[\pP\s]?max/i', 'make_id' => $makeId],
            ['name' => 'Capri', 'regex' => '/capri/i', 'make_id' => $makeId],
            ['name' => 'C-MAX', 'regex' => '/c[\pP\s]?max/i', 'make_id' => $makeId],
            ['name' => 'Consul', 'regex' => '/consul/i', 'make_id' => $makeId],
            ['name' => 'Cougar', 'regex' => '/cougar/i', 'make_id' => $makeId],
            ['name' => 'Custom', 'regex' => '/custom/i', 'make_id' => $makeId],
            ['name' => 'Deluxe', 'regex' => '/deluxe/i', 'make_id' => $makeId],
            ['name' => 'Ecosport', 'regex' => '/ecosport/i', 'make_id' => $makeId],
            ['name' => 'Escort', 'regex' => '/escort/i', 'make_id' => $makeId],
            ['name' => 'Escort Cabriolet', 'regex' => '/escort[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => 'Explorer', 'regex' => '/explorer/i', 'make_id' => $makeId],
            ['name' => 'Fiesta', 'regex' => '/fiesta/i', 'make_id' => $makeId],
            ['name' => 'Focus', 'regex' => '/focus/i', 'make_id' => $makeId],
            ['name' => 'Focus Cabriolet', 'regex' => '/focus[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => 'Fusion', 'regex' => '/fusion/i', 'make_id' => $makeId],
            ['name' => 'Galaxy', 'regex' => '/galaxy/i', 'make_id' => $makeId],
            ['name' => 'Granada', 'regex' => '/granada/i', 'make_id' => $makeId],
            ['name' => 'Grand C-Max', 'regex' => '/grand[\pP\s]?c[\pP\s]?max/i', 'make_id' => $makeId],
            ['name' => 'Ka', 'regex' => '/ka/i', 'make_id' => $makeId],
            ['name' => 'Kuga', 'regex' => '/kuga/i', 'make_id' => $makeId],
            ['name' => 'Maverick', 'regex' => '/maverick/i', 'make_id' => $makeId],
            ['name' => 'Mondeo', 'regex' => '/mondeo/i', 'make_id' => $makeId],
            ['name' => 'Mustang', 'regex' => '/mustang/i', 'make_id' => $makeId],
            ['name' => 'Orion', 'regex' => '/orion/i', 'make_id' => $makeId],
            ['name' => 'Pinto', 'regex' => '/pinto/i', 'make_id' => $makeId],
            ['name' => 'Probe', 'regex' => '/probe/i', 'make_id' => $makeId],
            ['name' => 'Puma', 'regex' => '/puma/i', 'make_id' => $makeId],
            ['name' => 'Ranger', 'regex' => '/ranger/i', 'make_id' => $makeId],
            ['name' => 'Scorpio', 'regex' => '/scorpio/i', 'make_id' => $makeId],
            ['name' => 'Sierra', 'regex' => '/sierra/i', 'make_id' => $makeId],
            ['name' => 'S-MAX', 'regex' => '/s[\pP\s]?max/i', 'make_id' => $makeId],
            ['name' => 'StreetKa', 'regex' => '/streetka/i', 'make_id' => $makeId],
            ['name' => 'T', 'regex' => '/t/i', 'make_id' => $makeId],
            ['name' => 'Taunus', 'regex' => '/taunus/i', 'make_id' => $makeId],
            ['name' => 'Taurus', 'regex' => '/taurus/i', 'make_id' => $makeId],
            ['name' => 'Tourneo', 'regex' => '/tourneo/i', 'make_id' => $makeId],
            ['name' => 'Transit', 'regex' => '/transit/i', 'make_id' => $makeId],
            ['name' => 'Transit 280S', 'regex' => '/transit[\pP\s]?280s/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
