<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Peugeot extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Peugeot')->pluck('id');

        $models = [
            ['name' => '1007', 'regex' => '/1007/', 'make_id' => $makeId],
            ['name' => '104', 'regex' => '/104/', 'make_id' => $makeId],
            ['name' => '106', 'regex' => '/106/', 'make_id' => $makeId],
            ['name' => '107', 'regex' => '/107/', 'make_id' => $makeId],
            ['name' => '108', 'regex' => '/108/', 'make_id' => $makeId],
            ['name' => '2008', 'regex' => '/2008/', 'make_id' => $makeId],
            ['name' => '204', 'regex' => '/204/', 'make_id' => $makeId],
            ['name' => '205', 'regex' => '/205/', 'make_id' => $makeId],
            ['name' => '206', 'regex' => '/206/', 'make_id' => $makeId],
            ['name' => '206+', 'regex' => '/206+/i', 'make_id' => $makeId],
            ['name' => '206 CC', 'regex' => '/206[\pP\s]?cc/i', 'make_id' => $makeId],
            ['name' => '207', 'regex' => '/207/', 'make_id' => $makeId],
            ['name' => '207 CC', 'regex' => '/207[\pP\s]?cc/i', 'make_id' => $makeId],
            ['name' => '207 Outdoor', 'regex' => '/207[\pP\s]?outdoor/i', 'make_id' => $makeId],
            ['name' => '208', 'regex' => '/208/', 'make_id' => $makeId],
            ['name' => '3008', 'regex' => '/3008/', 'make_id' => $makeId],
            ['name' => '304', 'regex' => '/304/', 'make_id' => $makeId],
            ['name' => '305', 'regex' => '/305/', 'make_id' => $makeId],
            ['name' => '306', 'regex' => '/306/', 'make_id' => $makeId],
            ['name' => '306 Cabriolet', 'regex' => '/306[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => '307', 'regex' => '/307/', 'make_id' => $makeId],
            ['name' => '307 CC', 'regex' => '/307[\pP\s]?cc/i', 'make_id' => $makeId],
            ['name' => '308', 'regex' => '/308/', 'make_id' => $makeId],
            ['name' => '308 CC', 'regex' => '/308[\pP\s]?cc/i', 'make_id' => $makeId],
            ['name' => '309', 'regex' => '/309/', 'make_id' => $makeId],
            ['name' => '4007', 'regex' => '/4007/', 'make_id' => $makeId],
            ['name' => '404', 'regex' => '/404/', 'make_id' => $makeId],
            ['name' => '405', 'regex' => '/405/', 'make_id' => $makeId],
            ['name' => '406', 'regex' => '/406/', 'make_id' => $makeId],
            ['name' => '406 Coupe', 'regex' => '/406[\pP\s]?coupe/i', 'make_id' => $makeId],
            ['name' => '407', 'regex' => '/407/', 'make_id' => $makeId],
            ['name' => '407 Coupe', 'regex' => '/407[\pP\s]?coupe/i', 'make_id' => $makeId],
            ['name' => '5008', 'regex' => '/5008/', 'make_id' => $makeId],
            ['name' => '504', 'regex' => '/504/', 'make_id' => $makeId],
            ['name' => '505', 'regex' => '/505/', 'make_id' => $makeId],
            ['name' => '508', 'regex' => '/508/', 'make_id' => $makeId],
            ['name' => '604', 'regex' => '/604/', 'make_id' => $makeId],
            ['name' => '605', 'regex' => '/605/', 'make_id' => $makeId],
            ['name' => '607', 'regex' => '/607/', 'make_id' => $makeId],
            ['name' => '806', 'regex' => '/806/', 'make_id' => $makeId],
            ['name' => '807', 'regex' => '/807/', 'make_id' => $makeId],
            ['name' => 'Bipper', 'regex' => '/bipper/i', 'make_id' => $makeId],
            ['name' => 'Boxer', 'regex' => '/boxer/i', 'make_id' => $makeId],
            ['name' => 'Expert', 'regex' => '/expert/i', 'make_id' => $makeId],
            ['name' => 'iON', 'regex' => '/ion/i', 'make_id' => $makeId],
            ['name' => 'J5', 'regex' => '/j5/i', 'make_id' => $makeId],
            ['name' => 'Partner', 'regex' => '/partner/i', 'make_id' => $makeId],
            ['name' => 'Partner Tepee', 'regex' => '/partner[\pP\s]?tepee/i', 'make_id' => $makeId],
            ['name' => 'RCZ', 'regex' => '/rcz/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
