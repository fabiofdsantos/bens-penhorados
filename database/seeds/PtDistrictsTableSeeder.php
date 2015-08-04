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

class PtDistrictsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('pt_districts')->delete();

        $districts = [
            ['name' => 'Aveiro', 'code' => '01', 'regex' => '/\baveiro\b/i'],
            ['name' => 'Beja', 'code' => '02', 'regex' => '/\bbeja\b/i'],
            ['name' => 'Braga', 'code' => '03', 'regex' => '/\bbraga\b/i'],
            ['name' => 'Bragança', 'code' => '04', 'regex' => '/\bbraganca\b/i'],
            ['name' => 'Castelo Branco', 'code' => '05', 'regex' => '/\bcastelo\sbranco\b/i'],
            ['name' => 'Coimbra', 'code' => '06', 'regex' => '/\bcoimbra\b/i'],
            ['name' => 'Évora', 'code' => '07', 'regex' => '/\bevora\b/i'],
            ['name' => 'Faro', 'code' => '08', 'regex' => '/\bfaro\b/i'],
            ['name' => 'Guarda', 'code' => '09', 'regex' => '/\bguarda\b/i'],
            ['name' => 'Leiria', 'code' => '10', 'regex' => '/\bleiria\b/i'],
            ['name' => 'Lisboa', 'code' => '11', 'regex' => '/\blisboa\b/i'],
            ['name' => 'Portalegre', 'code' => '12', 'regex' => '/\bportalegre\b/i'],
            ['name' => 'Porto', 'code' => '13', 'regex' => '/\bporto\b/i'],
            ['name' => 'Santarém', 'code' => '14', 'regex' => '/\bsantarem\b/i'],
            ['name' => 'Setúbal', 'code' => '15', 'regex' => '/\bsetubal\b/i'],
            ['name' => 'Viana do Castelo', 'code' => '16', 'regex' => '/\bviana\sdo\scastelo\b/i'],
            ['name' => 'Vila Real', 'code' => '17', 'regex' => '/\bvila\sreal\b/i'],
            ['name' => 'Viseu', 'code' => '18', 'regex' => '/\bviseu\b/i'],
            ['name' => 'Angra do Heroísmo', 'code' => '19', 'regex' => '/\bangra\sdo\heroismo\b/i'],
            ['name' => 'Horta', 'code' => '20', 'regex' => '/\bhorta\b/i'],
            ['name' => 'Ponta Delgada', 'code' => '21', 'regex' => '/\bponta\sdelgada\b/i'],
            ['name' => 'Funchal', 'code' => '22', 'regex' => '/\bfunchal\b/i'],
        ];

        DB::table('pt_districts')->insert($districts);
    }
}
