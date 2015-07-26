<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Citroen extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Citroën')->pluck('id');

        $models = [
            ['name' => '2CV', 'regex' => '/2cv/i', 'make_id' => $makeId],
            ['name' => 'AX', 'regex' => '/ax/i', 'make_id' => $makeId],
            ['name' => 'Berlingo', 'regex' => '/berlingo/i', 'make_id' => $makeId],
            ['name' => 'BX', 'regex' => '/bx/i', 'make_id' => $makeId],
            ['name' => 'C1', 'regex' => '/c1/i', 'make_id' => $makeId],
            ['name' => 'C2', 'regex' => '/c2/i', 'make_id' => $makeId],
            ['name' => 'C25', 'regex' => '/c25/i', 'make_id' => $makeId],
            ['name' => 'C3', 'regex' => '/c3/i', 'make_id' => $makeId],
            ['name' => 'C3 Picasso', 'regex' => '/c3[\pP\s]?picasso/i', 'make_id' => $makeId],
            ['name' => 'C3 Pluriel', 'regex' => '/c3[\pP\s]?pluriel/i', 'make_id' => $makeId],
            ['name' => 'C4', 'regex' => '/c4/i', 'make_id' => $makeId],
            ['name' => 'C4 Cactus', 'regex' => '/c4[\pP\s]?cactus/i', 'make_id' => $makeId],
            ['name' => 'C4 Picasso', 'regex' => '/c4[\pP\s]?picasso/i', 'make_id' => $makeId],
            ['name' => 'C5', 'regex' => '/c5/i', 'make_id' => $makeId],
            ['name' => 'C6', 'regex' => '/c6/i', 'make_id' => $makeId],
            ['name' => 'C8', 'regex' => '/c8/i', 'make_id' => $makeId],
            ['name' => 'C-Crosser', 'regex' => '/c[\pP\s]?crosser/i', 'make_id' => $makeId],
            ['name' => 'CX', 'regex' => '/cx/i', 'make_id' => $makeId],
            ['name' => 'C-zero', 'regex' => '/c[\pP\s]?zero/i', 'make_id' => $makeId],
            ['name' => 'DS', 'regex' => '/ds/i', 'make_id' => $makeId],
            ['name' => 'DS3', 'regex' => '/ds3/i', 'make_id' => $makeId],
            ['name' => 'DS4', 'regex' => '/ds4/i', 'make_id' => $makeId],
            ['name' => 'DS5', 'regex' => '/ds5/i', 'make_id' => $makeId],
            ['name' => 'Evasion', 'regex' => '/evasion/i', 'make_id' => $makeId],
            ['name' => 'Grand C4 Picasso', 'regex' => '/grand[\pP\s]?c4[\pP\s]?picasso/i', 'make_id' => $makeId],
            ['name' => 'Jumper', 'regex' => '/jumper/i', 'make_id' => $makeId],
            ['name' => 'Jumpy', 'regex' => '/jumpy/i', 'make_id' => $makeId],
            ['name' => 'Méhari', 'regex' => '/m[eéèêẽë]hari/iu', 'make_id' => $makeId],
            ['name' => 'Nemo', 'regex' => '/nemo/i', 'make_id' => $makeId],
            ['name' => 'Saxo', 'regex' => '/saxo/i', 'make_id' => $makeId],
            ['name' => 'Visa', 'regex' => '/visa/i', 'make_id' => $makeId],
            ['name' => 'Xantia', 'regex' => '/xantia/i', 'make_id' => $makeId],
            ['name' => 'XM', 'regex' => '/xm/i', 'make_id' => $makeId],
            ['name' => 'Xsara', 'regex' => '/xsara/i', 'make_id' => $makeId],
            ['name' => 'Xsara Picasso', 'regex' => '/xsara[\pP\s]?picasso/i', 'make_id' => $makeId],
            ['name' => 'ZX', 'regex' => '/zx/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
