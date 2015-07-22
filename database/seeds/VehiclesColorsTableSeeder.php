<?php

use Illuminate\Database\Seeder;

class VehiclesColorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehicles_colors')->delete();

        $colors = [
            ['id'   => 1, 'name' => 'Preto', 'regex' => '/\bpret[o|a]\b/i'],
            ['id'   => 2, 'name' => 'Branco', 'regex' => '/\bbranc[o|a]\b/i'],
            ['id'   => 3, 'name' => 'Cinzento', 'regex' => '/\bcinzent[oa]\b/i'],
            ['id'   => 4, 'name' => 'Azul', 'regex' => '/\baz[uú]l\b/iu'],
            ['id'   => 5, 'name' => 'Vermelho', 'regex' => '/\bvermelh[oa]\b/i'],
            ['id'   => 6, 'name' => 'Verde', 'regex' => '/\bverde\b/i'],
            ['id'   => 7, 'name' => 'Amarelo', 'regex' => '/\bamarel[oa]\b/i'],
            ['id'   => 8, 'name' => 'Castanho', 'regex' => '/\bcastanh[oa]\b/i'],
            ['id'   => 9, 'name' => 'Prateado', 'regex' => '/\bpratead[oa]\b/i'],
            ['id'   => 10, 'name' => 'Dourado', 'regex' => '/\bdourad[oa]\b/i'],
            ['id'   => 11, 'name' => 'Rosa', 'regex' => '/\brosa\b/i'],
            ['id'   => 12, 'name' => 'Roxo', 'regex' => '/\broxo\b/i'],
            ['id'   => 13, 'name' => 'Bege', 'regex' => '/\bbege\b/i'],
        ];

        DB::table('vehicles_colors')->insert($colors);
    }
}
