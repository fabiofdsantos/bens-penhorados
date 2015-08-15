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

class Peugeot extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Peugeot')->pluck('id');

        $models = [
            ['name' => '1007', 'regex' => '/\b1007\b/', 'make_id' => $makeId],
            ['name' => '104', 'regex' => '/\b104\b/', 'make_id' => $makeId],
            ['name' => '106', 'regex' => '/\b106\b/', 'make_id' => $makeId],
            ['name' => '107', 'regex' => '/\b107\b/', 'make_id' => $makeId],
            ['name' => '108', 'regex' => '/\b108\b/', 'make_id' => $makeId],
            ['name' => '2008', 'regex' => '/\b2008\b/', 'make_id' => $makeId],
            ['name' => '204', 'regex' => '/\b204\b/', 'make_id' => $makeId],
            ['name' => '205', 'regex' => '/\b205\b/', 'make_id' => $makeId],
            ['name' => '206', 'regex' => '/\b206\b/', 'make_id' => $makeId],
            ['name' => '206+', 'regex' => '/206+/i', 'make_id' => $makeId],
            ['name' => '206 CC', 'regex' => '/206[\pP\s]?cc/i', 'make_id' => $makeId],
            ['name' => '207', 'regex' => '/\b207\b/', 'make_id' => $makeId],
            ['name' => '207 CC', 'regex' => '/207[\pP\s]?cc/i', 'make_id' => $makeId],
            ['name' => '207 Outdoor', 'regex' => '/207[\pP\s]?outdoor/i', 'make_id' => $makeId],
            ['name' => '208', 'regex' => '/\b208\b/', 'make_id' => $makeId],
            ['name' => '3008', 'regex' => '/\b3008\b/', 'make_id' => $makeId],
            ['name' => '304', 'regex' => '/\b304\b/', 'make_id' => $makeId],
            ['name' => '305', 'regex' => '/\b305\b/', 'make_id' => $makeId],
            ['name' => '306', 'regex' => '/\b306\b/', 'make_id' => $makeId],
            ['name' => '306 Cabriolet', 'regex' => '/306[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => '307', 'regex' => '/\b307\b/', 'make_id' => $makeId],
            ['name' => '307 CC', 'regex' => '/307[\pP\s]?cc/i', 'make_id' => $makeId],
            ['name' => '308', 'regex' => '/\b308\b/', 'make_id' => $makeId],
            ['name' => '308 CC', 'regex' => '/308[\pP\s]?cc/i', 'make_id' => $makeId],
            ['name' => '309', 'regex' => '/\b309\b/', 'make_id' => $makeId],
            ['name' => '4007', 'regex' => '/\b4007\b/', 'make_id' => $makeId],
            ['name' => '404', 'regex' => '/\b404\b/', 'make_id' => $makeId],
            ['name' => '405', 'regex' => '/\b405\b/', 'make_id' => $makeId],
            ['name' => '406', 'regex' => '/\b406\b/', 'make_id' => $makeId],
            ['name' => '406 Coupe', 'regex' => '/406[\pP\s]?coupe/i', 'make_id' => $makeId],
            ['name' => '407', 'regex' => '/\b407\b/', 'make_id' => $makeId],
            ['name' => '407 Coupe', 'regex' => '/407[\pP\s]?coupe/i', 'make_id' => $makeId],
            ['name' => '5008', 'regex' => '/\b5008\b/', 'make_id' => $makeId],
            ['name' => '504', 'regex' => '/\b504\b/', 'make_id' => $makeId],
            ['name' => '505', 'regex' => '/\b505\b/', 'make_id' => $makeId],
            ['name' => '508', 'regex' => '/\b508\b/', 'make_id' => $makeId],
            ['name' => '604', 'regex' => '/\b604\b/', 'make_id' => $makeId],
            ['name' => '605', 'regex' => '/\b605\b/', 'make_id' => $makeId],
            ['name' => '607', 'regex' => '/\b607\b/', 'make_id' => $makeId],
            ['name' => '806', 'regex' => '/\b806\b/', 'make_id' => $makeId],
            ['name' => '807', 'regex' => '/\b807\b/', 'make_id' => $makeId],
            ['name' => 'Bipper', 'regex' => '/bipper/i', 'make_id' => $makeId],
            ['name' => 'Boxer', 'regex' => '/boxer/i', 'make_id' => $makeId],
            ['name' => 'Expert', 'regex' => '/expert/i', 'make_id' => $makeId],
            ['name' => 'iON', 'regex' => '/ion/i', 'make_id' => $makeId],
            ['name' => 'J5', 'regex' => '/j5/i', 'make_id' => $makeId],
            ['name' => 'Partner', 'regex' => '/partner/i', 'make_id' => $makeId],
            ['name' => 'Partner Tepee', 'regex' => '/partner[\pP\s]?tepee/i', 'make_id' => $makeId],
            ['name' => 'RCZ', 'regex' => '/rcz/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
