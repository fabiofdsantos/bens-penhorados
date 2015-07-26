<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class AlfaRomeo extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Alfa Romeo')->pluck('id');

        $models = [
            ['name' => '145', 'regex' => '/145/', 'make_id' => $makeId],
            ['name' => '146', 'regex' => '/146/', 'make_id' => $makeId],
            ['name' => '147', 'regex' => '/147/', 'make_id' => $makeId],
            ['name' => '147 GTA', 'regex' => '/147[\pP\s]?gta/i', 'make_id' => $makeId],
            ['name' => '155', 'regex' => '/155/', 'make_id' => $makeId],
            ['name' => '156', 'regex' => '/156/', 'make_id' => $makeId],
            ['name' => '159', 'regex' => '/159/', 'make_id' => $makeId],
            ['name' => '164', 'regex' => '/164/', 'make_id' => $makeId],
            ['name' => '166', 'regex' => '/166/', 'make_id' => $makeId],
            ['name' => '2000', 'regex' => '/2000/', 'make_id' => $makeId],
            ['name' => '33', 'regex' => '/33/', 'make_id' => $makeId],
            ['name' => '75', 'regex' => '/75/', 'make_id' => $makeId],
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
