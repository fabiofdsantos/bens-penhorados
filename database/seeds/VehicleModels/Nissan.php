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

class Nissan extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Nissan')->pluck('id');

        $models = [
            ['name' => '100 NX', 'regex' => '/100[\pP\s]?nx/i', 'make_id' => $makeId],
            ['name' => '200 SX', 'regex' => '/200[\pP\s]?sx/i', 'make_id' => $makeId],
            ['name' => '300 ZX', 'regex' => '/300[\pP\s]?zx/i', 'make_id' => $makeId],
            ['name' => '350Z', 'regex' => '/350z/i', 'make_id' => $makeId],
            ['name' => 'Almera', 'regex' => '/almera/i', 'make_id' => $makeId],
            ['name' => 'Bluebird', 'regex' => '/bluebird/i', 'make_id' => $makeId],
            ['name' => 'Cabstar', 'regex' => '/cabstar/i', 'make_id' => $makeId],
            ['name' => 'Cargo', 'regex' => '/cargo/i', 'make_id' => $makeId],
            ['name' => 'GT-R', 'regex' => '/gt[\pP\s]?r/i', 'make_id' => $makeId],
            ['name' => 'Interstar', 'regex' => '/interstar/i', 'make_id' => $makeId],
            ['name' => 'Juke', 'regex' => '/juke/i', 'make_id' => $makeId],
            ['name' => 'King', 'regex' => '/king/i', 'make_id' => $makeId],
            ['name' => 'Leaf', 'regex' => '/leaf/i', 'make_id' => $makeId],
            ['name' => 'Maxima', 'regex' => '/maxima/i', 'make_id' => $makeId],
            ['name' => 'Micra', 'regex' => '/micra/i', 'make_id' => $makeId],
            ['name' => 'Micra C+C', 'regex' => '/micra[\pP\s]?c+c/i', 'make_id' => $makeId],
            ['name' => 'Murano', 'regex' => '/murano/i', 'make_id' => $makeId],
            ['name' => 'Navara', 'regex' => '/navara/i', 'make_id' => $makeId],
            ['name' => 'Navarra', 'regex' => '/navarra/i', 'make_id' => $makeId],
            ['name' => 'Note', 'regex' => '/note/i', 'make_id' => $makeId],
            ['name' => 'Pathfinder', 'regex' => '/pathfinder/i', 'make_id' => $makeId],
            ['name' => 'Patrol', 'regex' => '/patrol/i', 'make_id' => $makeId],
            ['name' => 'PickUp', 'regex' => '/pickup/i', 'make_id' => $makeId],
            ['name' => 'Pixo', 'regex' => '/pixo/i', 'make_id' => $makeId],
            ['name' => 'Prairie', 'regex' => '/prairie/i', 'make_id' => $makeId],
            ['name' => 'Primastar', 'regex' => '/primastar/i', 'make_id' => $makeId],
            ['name' => 'Primera', 'regex' => '/primera/i', 'make_id' => $makeId],
            ['name' => 'Pulsar', 'regex' => '/pulsar/i', 'make_id' => $makeId],
            ['name' => 'Qashqai', 'regex' => '/qashqai/i', 'make_id' => $makeId],
            ['name' => 'Qashqai +2', 'regex' => '/qashqai[\pP\s]?+2/i', 'make_id' => $makeId],
            ['name' => 'Sentra', 'regex' => '/sentra/i', 'make_id' => $makeId],
            ['name' => 'Serena', 'regex' => '/serena/i', 'make_id' => $makeId],
            ['name' => 'Sunny', 'regex' => '/sunny/i', 'make_id' => $makeId],
            ['name' => 'Terrano', 'regex' => '/terrano/i', 'make_id' => $makeId],
            ['name' => 'Tiida', 'regex' => '/tiida/i', 'make_id' => $makeId],
            ['name' => 'Trade', 'regex' => '/trade/i', 'make_id' => $makeId],
            ['name' => 'Urvan', 'regex' => '/urvan/i', 'make_id' => $makeId],
            ['name' => 'Vanette', 'regex' => '/vanette/i', 'make_id' => $makeId],
            ['name' => 'X-Trail', 'regex' => '/x[\pP\s]?trail/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
