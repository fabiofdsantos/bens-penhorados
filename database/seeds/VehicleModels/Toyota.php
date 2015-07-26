<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Toyota extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Toyota')->pluck('id');

        $models = [
            ['name' => '4Runner', 'regex' => '/4runner/i', 'make_id' => $makeId],
            ['name' => 'Auris', 'regex' => '/auris/i', 'make_id' => $makeId],
            ['name' => 'Avensis', 'regex' => '/avensis/i', 'make_id' => $makeId],
            ['name' => 'Avensis Verso', 'regex' => '/avensis[\pP\s]?verso/i', 'make_id' => $makeId],
            ['name' => 'Aygo', 'regex' => '/aygo/i', 'make_id' => $makeId],
            ['name' => 'Camry', 'regex' => '/camry/i', 'make_id' => $makeId],
            ['name' => 'Carina', 'regex' => '/carina/i', 'make_id' => $makeId],
            ['name' => 'Carina E', 'regex' => '/carina[\pP\s]?e/i', 'make_id' => $makeId],
            ['name' => 'Carina II', 'regex' => '/carina[\pP\s]?ii/i', 'make_id' => $makeId],
            ['name' => 'Celica', 'regex' => '/celica/i', 'make_id' => $makeId],
            ['name' => 'Corolla', 'regex' => '/corolla/i', 'make_id' => $makeId],
            ['name' => 'Corolla Verso', 'regex' => '/corolla[\pP\s]?verso/i', 'make_id' => $makeId],
            ['name' => 'Cressida', 'regex' => '/cressida/i', 'make_id' => $makeId],
            ['name' => 'Crown', 'regex' => '/crown/i', 'make_id' => $makeId],
            ['name' => 'Dyna', 'regex' => '/dyna/i', 'make_id' => $makeId],
            ['name' => 'HiAce', 'regex' => '/hiace/i', 'make_id' => $makeId],
            ['name' => 'Highlander Hybrid', 'regex' => '/highlander[\pP\s]?hybrid/i', 'make_id' => $makeId],
            ['name' => 'HiLux', 'regex' => '/hilux/i', 'make_id' => $makeId],
            ['name' => 'iQ', 'regex' => '/iq/i', 'make_id' => $makeId],
            ['name' => 'Landcruiser', 'regex' => '/landcruiser/i', 'make_id' => $makeId],
            ['name' => 'Lite-Ace', 'regex' => '/lite[\pP\s]?ace/i', 'make_id' => $makeId],
            ['name' => 'MR2', 'regex' => '/mr2/i', 'make_id' => $makeId],
            ['name' => 'Paseo', 'regex' => '/paseo/i', 'make_id' => $makeId],
            ['name' => 'Previa', 'regex' => '/previa/i', 'make_id' => $makeId],
            ['name' => 'Prius', 'regex' => '/prius/i', 'make_id' => $makeId],
            ['name' => 'Prius+', 'regex' => '/prius+/i', 'make_id' => $makeId],
            ['name' => 'RAV4', 'regex' => '/rav4/i', 'make_id' => $makeId],
            ['name' => 'Starlet', 'regex' => '/starlet/i', 'make_id' => $makeId],
            ['name' => 'Supra', 'regex' => '/supra/i', 'make_id' => $makeId],
            ['name' => 'Tundra', 'regex' => '/tundra/i', 'make_id' => $makeId],
            ['name' => 'Urban Cruiser', 'regex' => '/urban[\pP\s]?cruiser/i', 'make_id' => $makeId],
            ['name' => 'Verso', 'regex' => '/verso/i', 'make_id' => $makeId],
            ['name' => 'Verso-S', 'regex' => '/verso[\pP\s]?s/i', 'make_id' => $makeId],
            ['name' => 'Yaris', 'regex' => '/yaris/i', 'make_id' => $makeId],
            ['name' => 'Yaris Verso', 'regex' => '/yaris[\pP\s]?verso/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
