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

class Guarda extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '09')->pluck('id');

        $municipalities = [
            ['name' => 'Aguiar da Beira', 'regex' => '/aguiar[\pP\s]?da[\pP\s]?beira/i', 'district_id' => $districtId],
            ['name' => 'Almeida', 'regex' => '/almeida/i', 'district_id' => $districtId],
            ['name' => 'Celorico da Beira', 'regex' => '/celorico[\pP\s]?da[\pP\s]?beira/i', 'district_id' => $districtId],
            ['name' => 'Figueira de Castelo Rodrigo', 'regex' => '/figueira[\pP\s]?de[\pP\s]?castelo[\pP\s]?rodrigo/i', 'district_id' => $districtId],
            ['name' => 'Fornos de Algodres', 'regex' => '/fornos[\pP\s]?de[\pP\s]?algodres/i', 'district_id' => $districtId],
            ['name' => 'Gouveia', 'regex' => '/gouveia/i', 'district_id' => $districtId],
            ['name' => 'Guarda', 'regex' => '/guarda/i', 'district_id' => $districtId],
            ['name' => 'Manteigas', 'regex' => '/manteigas/i', 'district_id' => $districtId],
            ['name' => 'Meda', 'regex' => '/meda/i', 'district_id' => $districtId],
            ['name' => 'Pinhel', 'regex' => '/pinhel/i', 'district_id' => $districtId],
            ['name' => 'Sabugal', 'regex' => '/sabugal/i', 'district_id' => $districtId],
            ['name' => 'Seia', 'regex' => '/seia/i', 'district_id' => $districtId],
            ['name' => 'Trancoso', 'regex' => '/trancoso/i', 'district_id' => $districtId],
            ['name' => 'Vila Nova de Foz Coa', 'regex' => '/vila[\pP\s]?nova[\pP\s]?de[\pP\s]?foz[\pP\s]?coa/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
