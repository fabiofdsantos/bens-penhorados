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

class Braga extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '03')->pluck('id');

        $municipalities = [
            ['name' => 'Barcelos', 'regex' => '/barcelos/i', 'district_id' => $districtId],
            ['name' => 'Braga', 'regex' => '/braga/i', 'district_id' => $districtId],
            ['name' => 'Cabeceiras de Basto', 'regex' => '/cabeceiras[\pP\s]?de[\pP\s]?basto/i', 'district_id' => $districtId],
            ['name' => 'Celorico de Basto', 'regex' => '/celorico[\pP\s]?de[\pP\s]?basto/i', 'district_id' => $districtId],
            ['name' => 'Esposende', 'regex' => '/esposende/i', 'district_id' => $districtId],
            ['name' => 'Fafe', 'regex' => '/fafe/i', 'district_id' => $districtId],
            ['name' => 'Guimarães', 'regex' => '/guimaraes/i', 'district_id' => $districtId],
            ['name' => 'Povoa de Lanhoso', 'regex' => '/povoa[\pP\s]?de[\pP\s]?lanhoso/i', 'district_id' => $districtId],
            ['name' => 'Terras de Bouro', 'regex' => '/terras[\pP\s]?de[\pP\s]?bouro/i', 'district_id' => $districtId],
            ['name' => 'Vieira do Minho', 'regex' => '/vieira[\pP\s]?do[\pP\s]?minho/i', 'district_id' => $districtId],
            ['name' => 'Vila Nova de Famalicão', 'regex' => '/vila[\pP\s]?nova[\pP\s]?de[\pP\s]?famalicao/i', 'district_id' => $districtId],
            ['name' => 'Vila Verde', 'regex' => '/vila[\pP\s]?verde/i', 'district_id' => $districtId],
            ['name' => 'Vizela', 'regex' => '/vizela/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
