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
