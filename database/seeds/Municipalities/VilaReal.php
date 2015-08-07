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

class VilaReal extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '17')->pluck('id');

        $municipalities = [
            ['name' => 'Boticas', 'regex' => '/boticas/i', 'district_id' => $districtId],
            ['name' => 'Chaves', 'regex' => '/chaves/i', 'district_id' => $districtId],
            ['name' => 'Mesão Frio', 'regex' => '/mesao[\pP\s]?frio/i', 'district_id' => $districtId],
            ['name' => 'Mondim de Basto', 'regex' => '/mondim[\pP\s]?de[\pP\s]?basto/i', 'district_id' => $districtId],
            ['name' => 'Montalegre', 'regex' => '/montalegre/i', 'district_id' => $districtId],
            ['name' => 'Murça', 'regex' => '/murc[\pP\s]?a/i', 'district_id' => $districtId],
            ['name' => 'Peso da Regua', 'regex' => '/peso[\pP\s]?da[\pP\s]?regua/i', 'district_id' => $districtId],
            ['name' => 'Ribeira de Pena', 'regex' => '/ribeira[\pP\s]?de[\pP\s]?pena/i', 'district_id' => $districtId],
            ['name' => 'Sabrosa', 'regex' => '/sabrosa/i', 'district_id' => $districtId],
            ['name' => 'Santa Marta de Penaguião', 'regex' => '/santa[\pP\s]?marta[\pP\s]?de[\pP\s]?penaguiao/i', 'district_id' => $districtId],
            ['name' => 'Valpaços', 'regex' => '/valpac[\pP\s]?os/i', 'district_id' => $districtId],
            ['name' => 'Vila Pouca de Aguiar', 'regex' => '/vila[\pP\s]?pouca[\pP\s]?de[\pP\s]?aguiar/i', 'district_id' => $districtId],
            ['name' => 'Vila Real', 'regex' => '/vila[\pP\s]?real/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
