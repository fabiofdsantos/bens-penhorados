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

class Viseu extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '18')->pluck('id');

        $municipalities = [
            ['name' => 'Armamar', 'regex' => '/armamar/i', 'district_id' => $districtId],
            ['name' => 'Carregal do Sal', 'regex' => '/carregal[\pP\s]?do[\pP\s]?sal/i', 'district_id' => $districtId],
            ['name' => 'Castro Daire', 'regex' => '/castro[\pP\s]?daire/i', 'district_id' => $districtId],
            ['name' => 'Cinfães', 'regex' => '/cinfaes/i', 'district_id' => $districtId],
            ['name' => 'Lamego', 'regex' => '/lamego/i', 'district_id' => $districtId],
            ['name' => 'Mangualde', 'regex' => '/mangualde/i', 'district_id' => $districtId],
            ['name' => 'Moimenta da Beira', 'regex' => '/moimenta[\pP\s]?da[\pP\s]?beira/i', 'district_id' => $districtId],
            ['name' => 'Mortagua', 'regex' => '/mortagua/i', 'district_id' => $districtId],
            ['name' => 'Nelas', 'regex' => '/nelas/i', 'district_id' => $districtId],
            ['name' => 'Oliveira de Frades', 'regex' => '/oliveira[\pP\s]?de[\pP\s]?frades/i', 'district_id' => $districtId],
            ['name' => 'Penalva do Castelo', 'regex' => '/penalva[\pP\s]?do[\pP\s]?castelo/i', 'district_id' => $districtId],
            ['name' => 'Penedono', 'regex' => '/penedono/i', 'district_id' => $districtId],
            ['name' => 'Resende', 'regex' => '/resende/i', 'district_id' => $districtId],
            ['name' => 'Santa Comba Dão', 'regex' => '/santa[\pP\s]?comba[\pP\s]?dao/i', 'district_id' => $districtId],
            ['name' => 'S. João da Pesqueira', 'regex' => '/s[\pP\s]?[\pP\s]?joao[\pP\s]?da[\pP\s]?pesqueira/i', 'district_id' => $districtId],
            ['name' => 'S. Pedro do Sul', 'regex' => '/s[\pP\s]?[\pP\s]?pedro[\pP\s]?do[\pP\s]?sul/i', 'district_id' => $districtId],
            ['name' => 'Satão', 'regex' => '/satao/i', 'district_id' => $districtId],
            ['name' => 'Sernancelhe', 'regex' => '/sernancelhe/i', 'district_id' => $districtId],
            ['name' => 'Tabuaço', 'regex' => '/tabuac[\pP\s]?o/i', 'district_id' => $districtId],
            ['name' => 'Tarouca', 'regex' => '/tarouca/i', 'district_id' => $districtId],
            ['name' => 'Tondela', 'regex' => '/tondela/i', 'district_id' => $districtId],
            ['name' => 'Vila Nova de Paiva', 'regex' => '/vila[\pP\s]?nova[\pP\s]?de[\pP\s]?paiva/i', 'district_id' => $districtId],
            ['name' => 'Viseu', 'regex' => '/viseu/i', 'district_id' => $districtId],
            ['name' => 'Vouzela', 'regex' => '/vouzela/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
