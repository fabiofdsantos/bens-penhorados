<?php

use Illuminate\Database\Seeder;

class VehiclesColorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehicles_colors')->delete();

        $colors = [
            ['id'   => 1, 'name' => 'Preto', 'parent_id' => null],
            ['id'   => 2, 'name' => 'Branco', 'parent_id' => null],
            ['id'   => 3, 'name' => 'Cinzento', 'parent_id' => null],
            ['id'   => 4, 'name' => 'Azul', 'parent_id' => null],
            ['id'   => 5, 'name' => 'Vermelho', 'parent_id' => null],
            ['id'   => 6, 'name' => 'Verde', 'parent_id' => null],
            ['id'   => 7, 'name' => 'Amarelo', 'parent_id' => null],
            ['id'   => 8, 'name' => 'Castanho', 'parent_id' => null],
            ['id'   => 9, 'name' => 'Prateado', 'parent_id' => null],
            ['id'   => 10, 'name' => 'Dourado', 'parent_id' => null],
            ['id'   => 11, 'name' => 'Rosa', 'parent_id' => null],
            ['id'   => 12, 'name' => 'Roxo', 'parent_id' => null],
            ['id'   => 13, 'name' => 'Bege', 'parent_id' => null],
            ['name' => 'Preta', 'parent_id' => 1],
            ['name' => 'Branca', 'parent_id' => 2],
            ['name' => 'Cinzenta', 'parent_id' => 3],
            ['name' => 'Vermelha', 'parent_id' => 5],
            ['name' => 'Dourada', 'parent_id' => 10],
            ['name' => 'Prateada', 'parent_id' => 9],
            ['name' => 'Castanha', 'parent_id' => 8],
        ];

        DB::table('vehicles_colors')->insert($colors);
    }
}
