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

class VianaDoCastelo extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '16')->pluck('id');

        $municipalities = [
            ['name' => 'Caminha', 'regex' => '/caminha/i', 'district_id' => $districtId],
            ['name' => 'Melgaço', 'regex' => '/melgac[\pP\s]?o/i', 'district_id' => $districtId],
            ['name' => 'Monção', 'regex' => '/monc[\pP\s]?ao/i', 'district_id' => $districtId],
            ['name' => 'Paredes de Coura', 'regex' => '/paredes[\pP\s]?de[\pP\s]?coura/i', 'district_id' => $districtId],
            ['name' => 'Ponte da Barca', 'regex' => '/ponte[\pP\s]?da[\pP\s]?barca/i', 'district_id' => $districtId],
            ['name' => 'Ponte de Lima', 'regex' => '/ponte[\pP\s]?de[\pP\s]?lima/i', 'district_id' => $districtId],
            ['name' => 'Valença', 'regex' => '/valenc[\pP\s]?a/i', 'district_id' => $districtId],
            ['name' => 'Viana do Castelo', 'regex' => '/viana[\pP\s]?do[\pP\s]?castelo/i', 'district_id' => $districtId],
            ['name' => 'Vila Nova de Cerveira', 'regex' => '/vila[\pP\s]?nova[\pP\s]?de[\pP\s]?cerveira/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
