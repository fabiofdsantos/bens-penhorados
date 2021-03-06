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

class Honda extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Honda')->pluck('id');

        $models = [
            ['name' => 'Accord', 'regex' => '/accord/i', 'make_id' => $makeId],
            ['name' => 'Civic', 'regex' => '/civic/i', 'make_id' => $makeId],
            ['name' => 'Concerto', 'regex' => '/concerto/i', 'make_id' => $makeId],
            ['name' => 'CR-V', 'regex' => '/cr[\pP\s]?v/i', 'make_id' => $makeId],
            ['name' => 'CR-X', 'regex' => '/cr[\pP\s]?x/i', 'make_id' => $makeId],
            ['name' => 'CR-Z', 'regex' => '/cr[\pP\s]?z/i', 'make_id' => $makeId],
            ['name' => 'HR-V', 'regex' => '/hr[\pP\s]?v/i', 'make_id' => $makeId],
            ['name' => 'Insight', 'regex' => '/insight/i', 'make_id' => $makeId],
            ['name' => 'Integra', 'regex' => '/integra/i', 'make_id' => $makeId],
            ['name' => 'Jazz', 'regex' => '/jazz/i', 'make_id' => $makeId],
            ['name' => 'Legend', 'regex' => '/legend/i', 'make_id' => $makeId],
            ['name' => 'NSX', 'regex' => '/nsx/i', 'make_id' => $makeId],
            ['name' => 'Prelude', 'regex' => '/prelude/i', 'make_id' => $makeId],
            ['name' => 'S2000', 'regex' => '/s2000/i', 'make_id' => $makeId],
            ['name' => 'Stream', 'regex' => '/stream/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
