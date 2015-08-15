<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Seeder;

/**
 * This is the vehicle's colors table seeder class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class VehicleColorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehicle_colors')->delete();

        $colors = [
            ['name' => 'Preto', 'regex' => '/\bpret[o|a]\b/i'],
            ['name' => 'Branco', 'regex' => '/\bbranc[o|a]|esbranquicad[oa]\b/i'],
            ['name' => 'Cinzento', 'regex' => '/\bcinzent[oa]|cinza|acinzentad[oa]\b/i'],
            ['name' => 'Azul', 'regex' => '/\bazul|azulad[oa]\b/i'],
            ['name' => 'Vermelho', 'regex' => '/\bvermelh[oa]|avermelhad[oa]|encarnad[oa]\b/i'],
            ['name' => 'Verde', 'regex' => '/\bverde|esverdead[oa]\b/i'],
            ['name' => 'Amarelo', 'regex' => '/\bamarel[oa]|amarelad[oa]\b/i'],
            ['name' => 'Castanho', 'regex' => '/\bcastanh[oa]|acastanhad[oa]\b/i'],
            ['name' => 'Prateado', 'regex' => '/\bpratead[oa]\b/i'],
            ['name' => 'Dourado', 'regex' => '/\bdourad[oa]\b/i'],
            ['name' => 'Rosa', 'regex' => '/\brosa\b/i'],
            ['name' => 'Roxo', 'regex' => '/\brox[oa]\b/i'],
            ['name' => 'Bege', 'regex' => '/\bbege\b/i'],
        ];

        DB::table('vehicle_colors')->insert($colors);
    }
}
