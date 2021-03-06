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

class Hyundai extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Hyundai')->pluck('id');

        $models = [
            ['name' => 'Accent', 'regex' => '/accent/i', 'make_id' => $makeId],
            ['name' => 'Atos', 'regex' => '/atos/i', 'make_id' => $makeId],
            ['name' => 'Coupé', 'regex' => '/coupe/i', 'make_id' => $makeId],
            ['name' => 'Elantra', 'regex' => '/elantra/i', 'make_id' => $makeId],
            ['name' => 'Galloper', 'regex' => '/galloper/i', 'make_id' => $makeId],
            ['name' => 'Getz', 'regex' => '/getz/i', 'make_id' => $makeId],
            ['name' => 'H-1', 'regex' => '/h[\pP\s]?1/i', 'make_id' => $makeId],
            ['name' => 'H 100', 'regex' => '/h[\pP\s]?100/i', 'make_id' => $makeId],
            ['name' => 'i10', 'regex' => '/i10/i', 'make_id' => $makeId],
            ['name' => 'i20', 'regex' => '/i20/i', 'make_id' => $makeId],
            ['name' => 'i30', 'regex' => '/i30/i', 'make_id' => $makeId],
            ['name' => 'i40', 'regex' => '/i40/i', 'make_id' => $makeId],
            ['name' => 'ix20', 'regex' => '/ix20/i', 'make_id' => $makeId],
            ['name' => 'ix35', 'regex' => '/ix35/i', 'make_id' => $makeId],
            ['name' => 'Lantra', 'regex' => '/lantra/i', 'make_id' => $makeId],
            ['name' => 'Matrix', 'regex' => '/matrix/i', 'make_id' => $makeId],
            ['name' => 'Pony', 'regex' => '/pony/i', 'make_id' => $makeId],
            ['name' => 'Santa Fe', 'regex' => '/santa[\pP\s]?fe/i', 'make_id' => $makeId],
            ['name' => 'S-Coupe', 'regex' => '/s[\pP\s]?coupe/i', 'make_id' => $makeId],
            ['name' => 'Sonata', 'regex' => '/sonata/i', 'make_id' => $makeId],
            ['name' => 'Trajet', 'regex' => '/trajet/i', 'make_id' => $makeId],
            ['name' => 'Tucson', 'regex' => '/tucson/i', 'make_id' => $makeId],
            ['name' => 'Veloster', 'regex' => '/veloster/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
