<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Mitsubishi extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Mitsubishi')->pluck('id');

        $models = [
            ['name' => '3000', 'regex' => '/3000/', 'make_id' => $makeId],
            ['name' => 'ASX', 'regex' => '/asx/i', 'make_id' => $makeId],
            ['name' => 'Canter', 'regex' => '/canter/i', 'make_id' => $makeId],
            ['name' => 'Carisma', 'regex' => '/carisma/i', 'make_id' => $makeId],
            ['name' => 'Colt', 'regex' => '/colt/i', 'make_id' => $makeId],
            ['name' => 'Eclipse', 'regex' => '/eclipse/i', 'make_id' => $makeId],
            ['name' => 'Galant', 'regex' => '/galant/i', 'make_id' => $makeId],
            ['name' => 'Grandis', 'regex' => '/grandis/i', 'make_id' => $makeId],
            ['name' => 'i-MiEV', 'regex' => '/i[\pP\s]?miev/i', 'make_id' => $makeId],
            ['name' => 'L', 'regex' => '/l/i', 'make_id' => $makeId],
            ['name' => 'L200', 'regex' => '/l200/i', 'make_id' => $makeId],
            ['name' => 'L300', 'regex' => '/l300/i', 'make_id' => $makeId],
            ['name' => 'L400', 'regex' => '/l400/i', 'make_id' => $makeId],
            ['name' => 'Lancer', 'regex' => '/lancer/i', 'make_id' => $makeId],
            ['name' => 'Montero', 'regex' => '/montero/i', 'make_id' => $makeId],
            ['name' => 'Outlander', 'regex' => '/outlander/i', 'make_id' => $makeId],
            ['name' => 'Outlander P-HEV', 'regex' => '/outlander[\pP\s]?p[\pP\s]?hev/i', 'make_id' => $makeId],
            ['name' => 'Pajero', 'regex' => '/pajero/i', 'make_id' => $makeId],
            ['name' => 'Space Gear', 'regex' => '/space[\pP\s]?gear/i', 'make_id' => $makeId],
            ['name' => 'Space Star', 'regex' => '/space[\pP\s]?star/i', 'make_id' => $makeId],
            ['name' => 'Space Wagon', 'regex' => '/space[\pP\s]?wagon/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
