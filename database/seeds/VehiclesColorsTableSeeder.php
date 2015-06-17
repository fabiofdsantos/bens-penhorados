<?php

use Illuminate\Database\Seeder;

class VehiclesColorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehicles_colors')->truncate();

        $colors = [
            ['id' => 1, 'name' => 'preto', 'parent_id' => null],
            ['id' => 2, 'name' => 'branco', 'parent_id' => null],
            ['id' => 3, 'name' => 'cinzento', 'parent_id' => null],
            ['id' => 4, 'name' => 'azul', 'parent_id' => null],
            ['id' => 5, 'name' => 'vermelho', 'parent_id' => null],
            ['id' => 6, 'name' => 'verde', 'parent_id' => null],
            ['id' => 7, 'name' => 'amarelo', 'parent_id' => null],
            ['id' => 8, 'name' => 'castanho', 'parent_id' => null],
            ['id' => 9, 'name' => 'prateado', 'parent_id' => null],
            ['id' => 10, 'name' => 'dourado', 'parent_id' => null],
            ['id' => 11, 'name' => 'rosa', 'parent_id' => null],
            ['id' => 12, 'name' => 'roxo', 'parent_id' => null],
            ['id' => 13, 'name' => 'bege', 'parent_id' => null],
            ['id' => 14, 'name' => 'preta', 'parent_id' => 1],
            ['id' => 15, 'name' => 'branca', 'parent_id' => 2],
            ['id' => 16, 'name' => 'cinzenta', 'parent_id' => 3],
            ['id' => 17, 'name' => 'vermelha', 'parent_id' => 5],
            ['id' => 18, 'name' => 'dourada', 'parent_id' => 10],
            ['id' => 19, 'name' => 'prateada', 'parent_id' => 9],
            ['id' => 20, 'name' => 'castanha', 'parent_id' => 8],
        ];

        DB::table('vehicles_colors')->insert($colors);
    }
}
