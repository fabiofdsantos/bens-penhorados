<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Municipalities;

use DB;
use Illuminate\Database\Seeder;

class Porto extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '13')->pluck('id');

        $municipalities = [
            ['name' => 'Baião', 'regex' => '/baiao/i', 'district_id' => $districtId],
            ['name' => 'Felgueiras', 'regex' => '/felgueiras/i', 'district_id' => $districtId],
            ['name' => 'Gondomar', 'regex' => '/gondomar/i', 'district_id' => $districtId],
            ['name' => 'Lousada', 'regex' => '/lousada/i', 'district_id' => $districtId],
            ['name' => 'Maia', 'regex' => '/maia/i', 'district_id' => $districtId],
            ['name' => 'Marco de Canaveses', 'regex' => '/marco[\pP\s]?de[\pP\s]?canaveses/i', 'district_id' => $districtId],
            ['name' => 'Matosinhos', 'regex' => '/matosinhos/i', 'district_id' => $districtId],
            ['name' => 'Paços de Ferreira', 'regex' => '/pac[\pP\s]?os[\pP\s]?de[\pP\s]?ferreira/i', 'district_id' => $districtId],
            ['name' => 'Paredes', 'regex' => '/paredes/i', 'district_id' => $districtId],
            ['name' => 'Penafiel', 'regex' => '/penafiel/i', 'district_id' => $districtId],
            ['name' => 'Porto', 'regex' => '/porto/i', 'district_id' => $districtId],
            ['name' => 'Povoa de Varzim', 'regex' => '/povoa[\pP\s]?de[\pP\s]?varzim/i', 'district_id' => $districtId],
            ['name' => 'Santo Tirso', 'regex' => '/santo[\pP\s]?tirso/i', 'district_id' => $districtId],
            ['name' => 'Valongo', 'regex' => '/valongo/i', 'district_id' => $districtId],
            ['name' => 'Vila do Conde', 'regex' => '/vila[\pP\s]?do[\pP\s]?conde/i', 'district_id' => $districtId],
            ['name' => 'Vila Nova de Gaia', 'regex' => '/vila[\pP\s]?nova[\pP\s]?de[\pP\s]?gaia/i', 'district_id' => $districtId],
            ['name' => 'Trofa', 'regex' => '/trofa/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
