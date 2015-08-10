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

class VehicleCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehicle_categories')->delete();

        $types = [
            ['name' => 'Automóvel ligeiro', 'regex' => '/ligeiro/i'],
            ['name' => 'Automóvel pesado', 'regex' => '/pesado/i'],
            ['name' => 'Motociclo', 'regex' => '/motociclo/i'],
            ['name' => 'Ciclomotor', 'regex' => '/ciclomotor/i'],
            ['name' => 'Triciclo', 'regex' => '/triciclo/i'],
            ['name' => 'Quadriciclo ligeiro', 'regex' => '/quadriciclo[\pP\s]?ligeiro/i'],
            ['name' => 'Quadriciclo pesado', 'regex' => '/quadriciclo[\pP\s]?pesado/i'],
            ['name' => 'Tractor agrícola/florestal', 'regex' => '/trac?tor/i'],
            ['name' => 'Motocultivador', 'regex' => '/moto\pP?cultivador/i'],
            ['name' => 'Tractocarro', 'regex' => '/trac?tocarro/i'],
            ['name' => 'Reboque', 'regex' => '/reboque/i'],
            ['name' => 'Máquina industrial', 'regex' => '/empihador/i'],
        ];

        DB::table('vehicle_categories')->insert($types);
    }
}
