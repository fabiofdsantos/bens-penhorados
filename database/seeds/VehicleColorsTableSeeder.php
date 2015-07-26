<?php

use Illuminate\Database\Seeder;

class VehicleColorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehicle_colors')->delete();

        $colors = [
            ['name' => 'Preto', 'regex' => '/\bpret[o|a]\b/i'],
            ['name' => 'Branco', 'regex' => '/\bbranc[o|a]\b/i'],
            ['name' => 'Cinzento', 'regex' => '/\bcinzent[oa]\b/i'],
            ['name' => 'Azul', 'regex' => '/\bazul\b/i'],
            ['name' => 'Vermelho', 'regex' => '/\bvermelh[oa]\b/i'],
            ['name' => 'Verde', 'regex' => '/\bverde\b/i'],
            ['name' => 'Amarelo', 'regex' => '/\bamarel[oa]\b/i'],
            ['name' => 'Castanho', 'regex' => '/\bcastanh[oa]\b/i'],
            ['name' => 'Prateado', 'regex' => '/\bpratead[oa]\b/i'],
            ['name' => 'Dourado', 'regex' => '/\bdourad[oa]\b/i'],
            ['name' => 'Rosa', 'regex' => '/\brosa\b/i'],
            ['name' => 'Roxo', 'regex' => '/\broxo\b/i'],
            ['name' => 'Bege', 'regex' => '/\bbege\b/i'],
        ];

        DB::table('vehicle_colors')->insert($colors);
    }
}
