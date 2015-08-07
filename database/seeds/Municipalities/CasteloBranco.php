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

class CasteloBranco extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '05')->pluck('id');

        $municipalities = [
            ['name' => 'Castelo Branco', 'regex' => '/castelo[\pP\s]?branco/i', 'district_id' => $districtId],
            ['name' => 'Covilhã', 'regex' => '/covilha/i', 'district_id' => $districtId],
            ['name' => 'Fundão', 'regex' => '/fundao/i', 'district_id' => $districtId],
            ['name' => 'Idanha-a-Nova', 'regex' => '/idanha[\pP\s]?a[\pP\s]?nova/i', 'district_id' => $districtId],
            ['name' => 'Oleiros', 'regex' => '/oleiros/i', 'district_id' => $districtId],
            ['name' => 'Penamacor', 'regex' => '/penamacor/i', 'district_id' => $districtId],
            ['name' => 'Proença-a-Nova', 'regex' => '/proenc[\pP\s]?a[\pP\s]?a[\pP\s]?nova/i', 'district_id' => $districtId],
            ['name' => 'Sertã', 'regex' => '/serta/i', 'district_id' => $districtId],
            ['name' => 'Vila de Rei', 'regex' => '/vila[\pP\s]?de[\pP\s]?rei/i', 'district_id' => $districtId],
            ['name' => 'Vila Velha de Rodão', 'regex' => '/vila[\pP\s]?velha[\pP\s]?de[\pP\s]?rodao/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
