<?php

use Illuminate\Database\Seeder;

class VehiclesFuelsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehicles_fuels')->delete();

        $fuels = [
            ['name' => 'Gasolina', 'regex' => '/\bgasolina\b/i'],
            ['name' => 'Diesel', 'regex' => '/\bgas[oó]leo\b/iu'],
            ['name' => 'GPL', 'regex' => '/\bgpl|g[aá]s\b/iu'],
            ['name' => 'Híbrido', 'regex' => '/\bh[íi]brido\b/iu'],
            ['name' => 'Eléctrico', 'regex' => '/\bel[ée]c?trico\b/iu'],
        ];

        DB::table('vehicles_fuels')->insert($fuels);
    }
}
