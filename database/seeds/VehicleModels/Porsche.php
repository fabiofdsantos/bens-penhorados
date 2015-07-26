<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Porsche extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Porsche')->pluck('id');

        $models = [
            ['name' => '911', 'regex' => '/911/', 'make_id' => $makeId],
            ['name' => '911 Carrera', 'regex' => '/911[\pP\s]?carrera/i', 'make_id' => $makeId],
            ['name' => '911 Carrera 4', 'regex' => '/911[\pP\s]?carrera[\pP\s]?4/i', 'make_id' => $makeId],
            ['name' => '911 Carrera 4S', 'regex' => '/911[\pP\s]?carrera[\pP\s]?4s/i', 'make_id' => $makeId],
            ['name' => '911 Carrera S', 'regex' => '/911[\pP\s]?carrera[\pP\s]?s/i', 'make_id' => $makeId],
            ['name' => '911 Targa 4', 'regex' => '/911[\pP\s]?targa[\pP\s]?4/i', 'make_id' => $makeId],
            ['name' => '911 Turbo', 'regex' => '/911[\pP\s]?turbo/i', 'make_id' => $makeId],
            ['name' => '911 Turbo S', 'regex' => '/911[\pP\s]?turbo[\pP\s]?s/i', 'make_id' => $makeId],
            ['name' => '996', 'regex' => '/996/', 'make_id' => $makeId],
            ['name' => '997', 'regex' => '/997/', 'make_id' => $makeId],
            ['name' => 'Boxster', 'regex' => '/boxster/i', 'make_id' => $makeId],
            ['name' => 'Boxster GTS', 'regex' => '/boxster[\pP\s]?gts/i', 'make_id' => $makeId],
            ['name' => 'Boxster S', 'regex' => '/boxster[\pP\s]?s/i', 'make_id' => $makeId],
            ['name' => 'Cayenne', 'regex' => '/cayenne/i', 'make_id' => $makeId],
            ['name' => 'Cayenne GTS', 'regex' => '/cayenne[\pP\s]?gts/i', 'make_id' => $makeId],
            ['name' => 'Cayenne S', 'regex' => '/cayenne[\pP\s]?s/i', 'make_id' => $makeId],
            ['name' => 'Cayenne S Hybrid', 'regex' => '/cayenne[\pP\s]?s[\pP\s]?hybrid/i', 'make_id' => $makeId],
            ['name' => 'Cayenne Turbo', 'regex' => '/cayenne[\pP\s]?turbo/i', 'make_id' => $makeId],
            ['name' => 'Cayman', 'regex' => '/cayman/i', 'make_id' => $makeId],
            ['name' => 'Macan', 'regex' => '/macan/i', 'make_id' => $makeId],
            ['name' => 'Macan S', 'regex' => '/macan[\pP\s]?s/i', 'make_id' => $makeId],
            ['name' => 'Panamera', 'regex' => '/panamera/i', 'make_id' => $makeId],
            ['name' => 'Panamera 4', 'regex' => '/panamera[\pP\s]?4/i', 'make_id' => $makeId],
            ['name' => 'Panamera 4S', 'regex' => '/panamera[\pP\s]?4s/i', 'make_id' => $makeId],
            ['name' => 'Panamera S', 'regex' => '/panamera[\pP\s]?s/i', 'make_id' => $makeId],
            ['name' => 'Panamera Turbo', 'regex' => '/panamera[\pP\s]?turbo/i', 'make_id' => $makeId],
            ['name' => '914', 'regex' => '/914/', 'make_id' => $makeId],
            ['name' => '924', 'regex' => '/924/', 'make_id' => $makeId],
            ['name' => '928', 'regex' => '/928/', 'make_id' => $makeId],
            ['name' => '944', 'regex' => '/944/', 'make_id' => $makeId],
            ['name' => '968', 'regex' => '/968/', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
