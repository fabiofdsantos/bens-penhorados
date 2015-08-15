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

class AlfaRomeo extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Alfa Romeo')->pluck('id');

        $models = [
            ['name' => '145', 'regex' => '/\b145\b/', 'make_id' => $makeId],
            ['name' => '146', 'regex' => '/\b146\b/', 'make_id' => $makeId],
            ['name' => '147', 'regex' => '/\b147\b/', 'make_id' => $makeId],
            ['name' => '147 GTA', 'regex' => '/147[\pP\s]?gta/i', 'make_id' => $makeId],
            ['name' => '155', 'regex' => '/\b155\b/', 'make_id' => $makeId],
            ['name' => '156', 'regex' => '/\b156\b/', 'make_id' => $makeId],
            ['name' => '159', 'regex' => '/\b159\b/', 'make_id' => $makeId],
            ['name' => '164', 'regex' => '/\b164\b/', 'make_id' => $makeId],
            ['name' => '166', 'regex' => '/\b166\b/', 'make_id' => $makeId],
            ['name' => '2000', 'regex' => '/\b2000\b/', 'make_id' => $makeId],
            ['name' => '33', 'regex' => '/\b33\b/', 'make_id' => $makeId],
            ['name' => '75', 'regex' => '/\b75\b/', 'make_id' => $makeId],
            ['name' => '8C Spider', 'regex' => '/8c[\pP\s]?spider/i', 'make_id' => $makeId],
            ['name' => 'Alfasud', 'regex' => '/alfasud/i', 'make_id' => $makeId],
            ['name' => 'Alfetta', 'regex' => '/alfetta/i', 'make_id' => $makeId],
            ['name' => 'Brera', 'regex' => '/brera/i', 'make_id' => $makeId],
            ['name' => 'Giulia', 'regex' => '/giulia/i', 'make_id' => $makeId],
            ['name' => 'Giulietta', 'regex' => '/giulietta/i', 'make_id' => $makeId],
            ['name' => 'GT', 'regex' => '/gt/i', 'make_id' => $makeId],
            ['name' => 'GTV', 'regex' => '/gtv/i', 'make_id' => $makeId],
            ['name' => 'MiTo', 'regex' => '/mito/i', 'make_id' => $makeId],
            ['name' => 'Spider', 'regex' => '/spider/i', 'make_id' => $makeId],
            ['name' => 'Sprint', 'regex' => '/sprint/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
