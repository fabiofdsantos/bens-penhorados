<?php

use Illuminate\Database\Seeder;

class VehicleFuelsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehicle_fuels')->delete();

        $fuels = [
            ['name' => 'Gasolina', 'regex' => '/\bgasolina\b/i'],
            ['name' => 'Diesel', 'regex' => '/\bdiesel|gasoleo\b/i'],
            ['name' => 'GPL', 'regex' => '/\bgpl|gas\b/i'],
            ['name' => 'Híbrido', 'regex' => '/\bhibrido\b/i'],
            ['name' => 'Eléctrico', 'regex' => '/\belec?trico\b/i'],
        ];

        DB::table('vehicle_fuels')->insert($fuels);
    }
}
