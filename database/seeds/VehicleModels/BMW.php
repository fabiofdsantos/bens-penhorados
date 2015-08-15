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

class BMW extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'BMW')->pluck('id');

        $models = [
            ['name' => '114', 'regex' => '/\b114\b/', 'make_id' => $makeId],
            ['name' => '116', 'regex' => '/\b116\b/', 'make_id' => $makeId],
            ['name' => '118', 'regex' => '/\b118\b/', 'make_id' => $makeId],
            ['name' => '120', 'regex' => '/\b120\b/', 'make_id' => $makeId],
            ['name' => '123', 'regex' => '/\b123\b/', 'make_id' => $makeId],
            ['name' => '125', 'regex' => '/\b125\b/', 'make_id' => $makeId],
            ['name' => '118 Cabriolet', 'regex' => '/118[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => '120 Cabriolet', 'regex' => '/120[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => '123 Cabriolet', 'regex' => '/123[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => '118 Coupé', 'regex' => '/118[\pP\s]?coupe/i', 'make_id' => $makeId],
            ['name' => '120 Coupé', 'regex' => '/120[\pP\s]?coupe/i', 'make_id' => $makeId],
            ['name' => '123 Coupé', 'regex' => '/123[\pP\s]?coupe/i', 'make_id' => $makeId],
            ['name' => '216', 'regex' => '/\b216\b/', 'make_id' => $makeId],
            ['name' => '218', 'regex' => '/\b218\b/', 'make_id' => $makeId],
            ['name' => '220', 'regex' => '/\b220\b/', 'make_id' => $makeId],
            ['name' => '315', 'regex' => '/\b315\b/', 'make_id' => $makeId],
            ['name' => '316', 'regex' => '/\b316\b/', 'make_id' => $makeId],
            ['name' => '318', 'regex' => '/\b318\b/', 'make_id' => $makeId],
            ['name' => '320', 'regex' => '/\b320\b/', 'make_id' => $makeId],
            ['name' => '323', 'regex' => '/\b323\b/', 'make_id' => $makeId],
            ['name' => '324', 'regex' => '/\b324\b/', 'make_id' => $makeId],
            ['name' => '325', 'regex' => '/\b325\b/', 'make_id' => $makeId],
            ['name' => '328', 'regex' => '/\b328\b/', 'make_id' => $makeId],
            ['name' => '330', 'regex' => '/\b330\b/', 'make_id' => $makeId],
            ['name' => '335', 'regex' => '/\b335\b/', 'make_id' => $makeId],
            ['name' => 'ActiveHybrid 3', 'regex' => '/activehybrid[\pP\s]?3/i', 'make_id' => $makeId],
            ['name' => 'M3', 'regex' => '/m3/i', 'make_id' => $makeId],
            ['name' => '316 Compact', 'regex' => '/316[\pP\s]?compact/i', 'make_id' => $makeId],
            ['name' => '318 Compact', 'regex' => '/318[\pP\s]?compact/i', 'make_id' => $makeId],
            ['name' => '318 Cabriolet', 'regex' => '/318[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => '320 Cabriolet', 'regex' => '/320[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => '323 Cabriolet', 'regex' => '/323[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => '325 Cabriolet', 'regex' => '/325[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => '328 Cabriolet', 'regex' => '/328[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => '330 Cabriolet', 'regex' => '/330[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => '335 Cabriolet', 'regex' => '/335[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => 'M3 Cabriolet', 'regex' => '/m3[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => '318 Gran Turismo', 'regex' => '/318[\pP\s]?gran[\pP\s]?turismo/i', 'make_id' => $makeId],
            ['name' => '320 Gran Turismo', 'regex' => '/320[\pP\s]?gran[\pP\s]?turismo/i', 'make_id' => $makeId],
            ['name' => '418', 'regex' => '/\b418\b/', 'make_id' => $makeId],
            ['name' => '420', 'regex' => '/\b420\b/', 'make_id' => $makeId],
            ['name' => '425', 'regex' => '/\b425\b/', 'make_id' => $makeId],
            ['name' => '435', 'regex' => '/\b435\b/', 'make_id' => $makeId],
            ['name' => 'M4', 'regex' => '/m4/i', 'make_id' => $makeId],
            ['name' => '518', 'regex' => '/\b518\b/', 'make_id' => $makeId],
            ['name' => '520', 'regex' => '/\b520\b/', 'make_id' => $makeId],
            ['name' => '523', 'regex' => '/\b523\b/', 'make_id' => $makeId],
            ['name' => '524', 'regex' => '/\b524\b/', 'make_id' => $makeId],
            ['name' => '525', 'regex' => '/\b525\b/', 'make_id' => $makeId],
            ['name' => '528', 'regex' => '/\b528\b/', 'make_id' => $makeId],
            ['name' => '530', 'regex' => '/\b530\b/', 'make_id' => $makeId],
            ['name' => '535', 'regex' => '/\b535\b/', 'make_id' => $makeId],
            ['name' => '545', 'regex' => '/\b545\b/', 'make_id' => $makeId],
            ['name' => 'M5', 'regex' => '/m5/i', 'make_id' => $makeId],
            ['name' => 'M550', 'regex' => '/m550/i', 'make_id' => $makeId],
            ['name' => '520 Gran Turismo', 'regex' => '/520[\pP\s]?gran[\pP\s]?turismo/i', 'make_id' => $makeId],
            ['name' => '530 Gran Turismo', 'regex' => '/530[\pP\s]?gran[\pP\s]?turismo/i', 'make_id' => $makeId],
            ['name' => '535 Gran Turismo', 'regex' => '/535[\pP\s]?gran[\pP\s]?turismo/i', 'make_id' => $makeId],
            ['name' => '630', 'regex' => '/\b630\b/', 'make_id' => $makeId],
            ['name' => '633', 'regex' => '/\b633\b/', 'make_id' => $makeId],
            ['name' => '635', 'regex' => '/\b635\b/', 'make_id' => $makeId],
            ['name' => '640', 'regex' => '/\b640\b/', 'make_id' => $makeId],
            ['name' => '645', 'regex' => '/\b645\b/', 'make_id' => $makeId],
            ['name' => '650', 'regex' => '/\b650\b/', 'make_id' => $makeId],
            ['name' => 'M6', 'regex' => '/m6/i', 'make_id' => $makeId],
            ['name' => '630 Cabriolet', 'regex' => '/630[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => '635 Cabriolet', 'regex' => '/635[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => '640 Cabriolet', 'regex' => '/640[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => '645 Cabriolet', 'regex' => '/645[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => 'M6 Cabriolet', 'regex' => '/m6[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => '725', 'regex' => '/\b725\b/', 'make_id' => $makeId],
            ['name' => '728', 'regex' => '/\b728\b/', 'make_id' => $makeId],
            ['name' => '730', 'regex' => '/\b730\b/', 'make_id' => $makeId],
            ['name' => '730L', 'regex' => '/730l/i', 'make_id' => $makeId],
            ['name' => '735', 'regex' => '/\b735\b/', 'make_id' => $makeId],
            ['name' => '735L', 'regex' => '/735l/i', 'make_id' => $makeId],
            ['name' => '740', 'regex' => '/\b740\b/', 'make_id' => $makeId],
            ['name' => '740L', 'regex' => '/740l/i', 'make_id' => $makeId],
            ['name' => '745', 'regex' => '/\b745\b/', 'make_id' => $makeId],
            ['name' => '750', 'regex' => '/\b750\b/', 'make_id' => $makeId],
            ['name' => '760L', 'regex' => '/760l/i', 'make_id' => $makeId],
            ['name' => 'ActiveHybrid 7', 'regex' => '/activehybrid[\pP\s]?7/i', 'make_id' => $makeId],
            ['name' => '850', 'regex' => '/\b850\b/', 'make_id' => $makeId],
            ['name' => 'M1', 'regex' => '/m1/i', 'make_id' => $makeId],
            ['name' => 'Z3 M', 'regex' => '/z3[\pP\s]?m/i', 'make_id' => $makeId],
            ['name' => 'Z4 M', 'regex' => '/z4[\pP\s]?m/i', 'make_id' => $makeId],
            ['name' => 'X1', 'regex' => '/x1/i', 'make_id' => $makeId],
            ['name' => 'X3', 'regex' => '/x3/i', 'make_id' => $makeId],
            ['name' => 'X4', 'regex' => '/x4/i', 'make_id' => $makeId],
            ['name' => 'X5', 'regex' => '/x5/i', 'make_id' => $makeId],
            ['name' => 'X6', 'regex' => '/x6/i', 'make_id' => $makeId],
            ['name' => 'Z3', 'regex' => '/z3/i', 'make_id' => $makeId],
            ['name' => 'Z4', 'regex' => '/z4/i', 'make_id' => $makeId],
            ['name' => '1600', 'regex' => '/\b1600\b/', 'make_id' => $makeId],
            ['name' => '1602', 'regex' => '/\b1602\b/', 'make_id' => $makeId],
            ['name' => '501', 'regex' => '/\b501\b/', 'make_id' => $makeId],
            ['name' => '502', 'regex' => '/\b502\b/', 'make_id' => $makeId],
            ['name' => 'i3', 'regex' => '/i3/i', 'make_id' => $makeId],
            ['name' => 'i8', 'regex' => '/i8/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
