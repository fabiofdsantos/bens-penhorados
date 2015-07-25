<?php

use Illuminate\Database\Seeder;

class VehiclesCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehicles_categories')->delete();

        $types = [
            ['name' => 'Automóvel ligeiro', 'regex' => '/ligeiro/i'],
            ['name' => 'Automóvel pesado', 'regex' => '/pesado/i'],
            ['name' => 'Motociclo', 'regex' => '/motociclo/i'],
            ['name' => 'Ciclomotor', 'regex' => '/ciclomotor/i'],
            ['name' => 'Triciclo', 'regex' => '/triciclo/i'],
            ['name' => 'Quadriciclo ligeiro', 'regex' => '/quadriciclo[\pP\s]?ligeiro/i'],
            ['name' => 'Quadriciclo pesado', 'regex' => '/quadriciclo[\pP\s]?pesado/i'],
            ['name' => 'Tractor agrícola/florestal', 'regex' => '/trac?tor/i'],
            ['name' => 'Motocultivador', 'regex' => '/moto\pP?cultivador/i'],
            ['name' => 'Tractocarro', 'regex' => '/trac?tocarro/i'],
        ];

        DB::table('vehicles_categories')->insert($types);
    }
}
