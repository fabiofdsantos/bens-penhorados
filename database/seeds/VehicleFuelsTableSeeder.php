<?php

use Illuminate\Database\Seeder;

class VehicleFuelsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehicle_fuels')->delete();

        $fuels = [
            ['name' => 'Gasolina', 'regex' => '/\bgasolina\b/i'],
            ['name' => 'Diesel', 'regex' => '/\bdiesel|gas[oó]leo\b/iu'],
            ['name' => 'GPL', 'regex' => '/\bgpl|g[aá]s\b/iu'],
            ['name' => 'Híbrido', 'regex' => '/\bh[íi]brido\b/iu'],
            ['name' => 'Eléctrico', 'regex' => '/\bel[ée]c?trico\b/iu'],
        ];

        DB::table('vehicle_fuels')->insert($fuels);
    }
}
