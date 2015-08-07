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

class Lisboa extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '11')->pluck('id');

        $municipalities = [
            ['name' => 'Arruda dos Vinhos', 'regex' => '/arruda[\pP\s]?dos[\pP\s]?vinhos/i', 'district_id' => $districtId],
            ['name' => 'Azambuja', 'regex' => '/azambuja/i', 'district_id' => $districtId],
            ['name' => 'Cadaval', 'regex' => '/cadaval/i', 'district_id' => $districtId],
            ['name' => 'Cascais', 'regex' => '/cascais/i', 'district_id' => $districtId],
            ['name' => 'Lisboa', 'regex' => '/lisboa/i', 'district_id' => $districtId],
            ['name' => 'Loures', 'regex' => '/loures/i', 'district_id' => $districtId],
            ['name' => 'Lourinhã', 'regex' => '/lourinha/i', 'district_id' => $districtId],
            ['name' => 'Mafra', 'regex' => '/mafra/i', 'district_id' => $districtId],
            ['name' => 'Oeiras', 'regex' => '/oeiras/i', 'district_id' => $districtId],
            ['name' => 'Sintra', 'regex' => '/sintra/i', 'district_id' => $districtId],
            ['name' => 'Sobral de Monte Agraço', 'regex' => '/sobral[\pP\s]?de[\pP\s]?monte[\pP\s]?agrac[\pP\s]?o/i', 'district_id' => $districtId],
            ['name' => 'Torres Vedras', 'regex' => '/torres[\pP\s]?vedras/i', 'district_id' => $districtId],
            ['name' => 'Vila Franca de Xira', 'regex' => '/vila[\pP\s]?franca[\pP\s]?de[\pP\s]?xira/i', 'district_id' => $districtId],
            ['name' => 'Amadora', 'regex' => '/amadora/i', 'district_id' => $districtId],
            ['name' => 'Odivelas', 'regex' => '/odivelas/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
