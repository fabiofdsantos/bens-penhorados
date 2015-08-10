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

class VehicleTypesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehicle_types')->delete();

        $types = [
            ['name' => 'Mercadorias', 'regex' => '/\bmercadorias\b/i'],
            ['name' => 'Passageiros', 'regex' => '/\bpassageiros\b/i'],
        ];

        DB::table('vehicle_types')->insert($types);
    }
}
