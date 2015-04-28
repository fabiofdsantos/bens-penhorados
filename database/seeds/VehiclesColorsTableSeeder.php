<?php

use Illuminate\Database\Seeder;

class VehiclesColorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehicles_colors')->truncate();

        $colors = [
            ['id' => 1, 'name' => 'preto'],
            ['id' => 2, 'name' => 'branco'],
            ['id' => 3, 'name' => 'cinzento'],
            ['id' => 4, 'name' => 'azul'],
            ['id' => 5, 'name' => 'vermelho'],
            ['id' => 6, 'name' => 'verde'],
            ['id' => 7, 'name' => 'amarelo'],
            ['id' => 8, 'name' => 'castanho'],
            ['id' => 9, 'name' => 'prateado'],
            ['id' => 10, 'name' => 'dourado'],
            ['id' => 11, 'name' => 'rosa'],
            ['id' => 12, 'name' => 'roxo'],
            ['id' => 13, 'name' => 'bege'],
            ['id' => 14, 'name' => 'preta'],
            ['id' => 15, 'name' => 'branca'],
            ['id' => 16, 'name' => 'cinzenta'],
            ['id' => 17, 'name' => 'vermelha'],
            ['id' => 18, 'name' => 'dourada'],
            ['id' => 19, 'name' => 'prateada'],
            ['id' => 20, 'name' => 'castanha']
        ];

        DB::table('vehicles_colors')->insert($colors);
    }
}
