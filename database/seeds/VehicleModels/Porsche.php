<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Porsche extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Porsche')->pluck('id');

        $models = [
            ['name' => '911', 'regex' => '/\b911\b/', 'make_id' => $makeId],
            ['name' => '911 Carrera', 'regex' => '/911[\pP\s]?carrera/i', 'make_id' => $makeId],
            ['name' => '911 Carrera 4', 'regex' => '/911[\pP\s]?carrera[\pP\s]?4/i', 'make_id' => $makeId],
            ['name' => '911 Carrera 4S', 'regex' => '/911[\pP\s]?carrera[\pP\s]?4s/i', 'make_id' => $makeId],
            ['name' => '911 Carrera S', 'regex' => '/911[\pP\s]?carrera[\pP\s]?s/i', 'make_id' => $makeId],
            ['name' => '911 Targa 4', 'regex' => '/911[\pP\s]?targa[\pP\s]?4/i', 'make_id' => $makeId],
            ['name' => '911 Turbo', 'regex' => '/911[\pP\s]?turbo/i', 'make_id' => $makeId],
            ['name' => '911 Turbo S', 'regex' => '/911[\pP\s]?turbo[\pP\s]?s/i', 'make_id' => $makeId],
            ['name' => '996', 'regex' => '/\b996\b/', 'make_id' => $makeId],
            ['name' => '997', 'regex' => '/\b997\b/', 'make_id' => $makeId],
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
            ['name' => '914', 'regex' => '/\b914\b/', 'make_id' => $makeId],
            ['name' => '924', 'regex' => '/\b924\b/', 'make_id' => $makeId],
            ['name' => '928', 'regex' => '/\b928\b/', 'make_id' => $makeId],
            ['name' => '944', 'regex' => '/\b944\b/', 'make_id' => $makeId],
            ['name' => '968', 'regex' => '/\b968\b/', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
