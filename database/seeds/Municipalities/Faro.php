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

class Faro extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '08')->pluck('id');

        $municipalities = [
            ['name' => 'Albufeira', 'regex' => '/albufeira/i', 'district_id' => $districtId],
            ['name' => 'Alcoutim', 'regex' => '/alcoutim/i', 'district_id' => $districtId],
            ['name' => 'Aljezur', 'regex' => '/aljezur/i', 'district_id' => $districtId],
            ['name' => 'Castro Marim', 'regex' => '/castro[\pP\s]?marim/i', 'district_id' => $districtId],
            ['name' => 'Faro', 'regex' => '/faro/i', 'district_id' => $districtId],
            ['name' => 'Lagoa (Algarve)', 'regex' => '/lagoa[\pP\s]?[\pP\s]?algarve[\pP\s]?/i', 'district_id' => $districtId],
            ['name' => 'Lagos', 'regex' => '/lagos/i', 'district_id' => $districtId],
            ['name' => 'Loule', 'regex' => '/loule/i', 'district_id' => $districtId],
            ['name' => 'Monchique', 'regex' => '/monchique/i', 'district_id' => $districtId],
            ['name' => 'Olhão', 'regex' => '/olhao/i', 'district_id' => $districtId],
            ['name' => 'Portimão', 'regex' => '/portimao/i', 'district_id' => $districtId],
            ['name' => 'S. Bras de Alportel', 'regex' => '/s[\pP\s]?[\pP\s]?bras[\pP\s]?de[\pP\s]?alportel/i', 'district_id' => $districtId],
            ['name' => 'Silves', 'regex' => '/silves/i', 'district_id' => $districtId],
            ['name' => 'Tavira', 'regex' => '/tavira/i', 'district_id' => $districtId],
            ['name' => 'Vila do Bispo', 'regex' => '/vila[\pP\s]?do[\pP\s]?bispo/i', 'district_id' => $districtId],
            ['name' => 'Vila Real de Santo Antonio', 'regex' => '/vila[\pP\s]?real[\pP\s]?de[\pP\s]?santo[\pP\s]?antonio/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
