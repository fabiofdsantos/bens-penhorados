<?php

use Illuminate\Database\Seeder;

class VehiclesFuelsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehicles_fuels')->delete();

        $fuels = [
            ['name' => 'Gasolina', 'alternative_name' => null],
            ['name' => 'Diesel', 'alternative_name' => 'Gasóleo'],
            ['name' => 'GPL', 'alternative_name' => 'Gás'],
            ['name' => 'Híbrido', 'alternative_name' => null],
            ['name' => 'Eléctrico', 'alternative_name' => null],
        ];

        DB::table('vehicles_fuels')->insert($fuels);
    }
}
