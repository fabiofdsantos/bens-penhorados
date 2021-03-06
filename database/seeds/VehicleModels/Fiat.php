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

class Fiat extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Fiat')->pluck('id');

        $models = [
            ['name' => '500', 'regex' => '/\b500\b/', 'make_id' => $makeId],
            ['name' => '500 Abarth', 'regex' => '/500[\pP\s]?abarth/i', 'make_id' => $makeId],
            ['name' => '500C', 'regex' => '/500c/i', 'make_id' => $makeId],
            ['name' => '500L', 'regex' => '/500l/i', 'make_id' => $makeId],
            ['name' => '500X', 'regex' => '/500x/i', 'make_id' => $makeId],
            ['name' => 'Grande Punto', 'regex' => '/grande[\pP\s]?punto/i', 'make_id' => $makeId],
            ['name' => 'Punto', 'regex' => '/punto/i', 'make_id' => $makeId],
            ['name' => 'Punto Cabriolet', 'regex' => '/punto[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => 'Punto Evo', 'regex' => '/punto[\pP\s]?evo/i', 'make_id' => $makeId],
            ['name' => '1200', 'regex' => '/\b1200\b/', 'make_id' => $makeId],
            ['name' => '124', 'regex' => '/\b124\b/', 'make_id' => $makeId],
            ['name' => '127', 'regex' => '/\b127\b/', 'make_id' => $makeId],
            ['name' => '128', 'regex' => '/\b128\b/', 'make_id' => $makeId],
            ['name' => '131', 'regex' => '/\b131\b/', 'make_id' => $makeId],
            ['name' => '1900', 'regex' => '/\b1900\b/', 'make_id' => $makeId],
            ['name' => '750', 'regex' => '/\b750\b/', 'make_id' => $makeId],
            ['name' => '8V', 'regex' => '/8v/i', 'make_id' => $makeId],
            ['name' => 'Barchetta', 'regex' => '/barchetta/i', 'make_id' => $makeId],
            ['name' => 'Brava', 'regex' => '/brava/i', 'make_id' => $makeId],
            ['name' => 'Bravo', 'regex' => '/bravo/i', 'make_id' => $makeId],
            ['name' => 'Cinquecento', 'regex' => '/cinquecento/i', 'make_id' => $makeId],
            ['name' => 'Coupé', 'regex' => '/coupe/i', 'make_id' => $makeId],
            ['name' => 'Croma', 'regex' => '/croma/i', 'make_id' => $makeId],
            ['name' => 'Doblò', 'regex' => '/doblo/i', 'make_id' => $makeId],
            ['name' => 'Ducato', 'regex' => '/ducato/i', 'make_id' => $makeId],
            ['name' => 'Ducato 14', 'regex' => '/ducato[\pP\s]?14/i', 'make_id' => $makeId],
            ['name' => 'Ducato 33', 'regex' => '/ducato[\pP\s]?33/i', 'make_id' => $makeId],
            ['name' => 'Fiorino', 'regex' => '/fiorino/i', 'make_id' => $makeId],
            ['name' => 'Freemont', 'regex' => '/freemont/i', 'make_id' => $makeId],
            ['name' => 'Idea', 'regex' => '/idea/i', 'make_id' => $makeId],
            ['name' => 'Linea', 'regex' => '/linea/i', 'make_id' => $makeId],
            ['name' => 'Marea', 'regex' => '/marea/i', 'make_id' => $makeId],
            ['name' => 'Multipla', 'regex' => '/multipla/i', 'make_id' => $makeId],
            ['name' => 'Palio', 'regex' => '/palio/i', 'make_id' => $makeId],
            ['name' => 'Panda', 'regex' => '/panda/i', 'make_id' => $makeId],
            ['name' => 'Regata', 'regex' => '/regata/i', 'make_id' => $makeId],
            ['name' => 'Ritmo', 'regex' => '/ritmo/i', 'make_id' => $makeId],
            ['name' => 'Scudo', 'regex' => '/scudo/i', 'make_id' => $makeId],
            ['name' => 'Seicento', 'regex' => '/seicento/i', 'make_id' => $makeId],
            ['name' => 'Stilo', 'regex' => '/stilo/i', 'make_id' => $makeId],
            ['name' => 'Strada', 'regex' => '/strada/i', 'make_id' => $makeId],
            ['name' => 'Tempra', 'regex' => '/tempra/i', 'make_id' => $makeId],
            ['name' => 'Tipo', 'regex' => '/tipo/i', 'make_id' => $makeId],
            ['name' => 'Ulysse', 'regex' => '/ulysse/i', 'make_id' => $makeId],
            ['name' => 'Uno', 'regex' => '/uno/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
