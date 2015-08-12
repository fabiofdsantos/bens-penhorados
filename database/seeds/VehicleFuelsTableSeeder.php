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
 * This is the vehicle's fuels table seeder class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
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
