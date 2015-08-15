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

class AngraDoHeroismo extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '19')->pluck('id');

        $municipalities = [
            ['name' => 'Angra do Heroismo', 'regex' => '/angra[\pP\s]?do[\pP\s]?heroismo/i', 'district_id' => $districtId],
            ['name' => 'Calheta (Açores)', 'regex' => '/calheta[\pP\s]?[\pP\s]?ac[\pP\s]?ores[\pP\s]?/i', 'district_id' => $districtId],
            ['name' => 'Santa Cruz da Graciosa', 'regex' => '/santa[\pP\s]?cruz[\pP\s]?da[\pP\s]?graciosa/i', 'district_id' => $districtId],
            ['name' => 'Velas', 'regex' => '/velas/i', 'district_id' => $districtId],
            ['name' => 'Vila Praia da Vitoria', 'regex' => '/vila[\pP\s]?praia[\pP\s]?da[\pP\s]?vitoria/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
