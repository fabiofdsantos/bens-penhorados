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

class Evora extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '07')->pluck('id');

        $municipalities = [
            ['name' => 'Arraiolos', 'regex' => '/arraiolos/i', 'district_id' => $districtId],
            ['name' => 'Borba', 'regex' => '/borba/i', 'district_id' => $districtId],
            ['name' => 'Estremoz', 'regex' => '/estremoz/i', 'district_id' => $districtId],
            ['name' => 'Evora', 'regex' => '/evora/i', 'district_id' => $districtId],
            ['name' => 'Montemor-o-Novo', 'regex' => '/montemor[\pP\s]?o[\pP\s]?novo/i', 'district_id' => $districtId],
            ['name' => 'Mora', 'regex' => '/mora/i', 'district_id' => $districtId],
            ['name' => 'Mourão', 'regex' => '/mourao/i', 'district_id' => $districtId],
            ['name' => 'Portel', 'regex' => '/portel/i', 'district_id' => $districtId],
            ['name' => 'Redondo', 'regex' => '/redondo/i', 'district_id' => $districtId],
            ['name' => 'Reguengos de Monsaraz', 'regex' => '/reguengos[\pP\s]?de[\pP\s]?monsaraz/i', 'district_id' => $districtId],
            ['name' => 'Vendas Novas', 'regex' => '/vendas[\pP\s]?novas/i', 'district_id' => $districtId],
            ['name' => 'Viana do Alentejo', 'regex' => '/viana[\pP\s]?do[\pP\s]?alentejo/i', 'district_id' => $districtId],
            ['name' => 'Vila Viçosa', 'regex' => '/vila[\pP\s]?vic[\pP\s]?osa/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
