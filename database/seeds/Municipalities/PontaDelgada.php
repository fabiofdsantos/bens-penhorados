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

class PontaDelgada extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '21')->pluck('id');

        $municipalities = [
            ['name' => 'Lagoa (açores)', 'regex' => '/lagoa[\pP\s]?[\pP\s]?ac[\pP\s]?ores[\pP\s]?/i', 'district_id' => $districtId],
            ['name' => 'Nordeste', 'regex' => '/nordeste/i', 'district_id' => $districtId],
            ['name' => 'Ponta Delgada', 'regex' => '/ponta[\pP\s]?delgada/i', 'district_id' => $districtId],
            ['name' => 'Povoação', 'regex' => '/povoac[\pP\s]?ao/i', 'district_id' => $districtId],
            ['name' => 'Ribeira Grande', 'regex' => '/ribeira[\pP\s]?grande/i', 'district_id' => $districtId],
            ['name' => 'Vila Franca do Campo', 'regex' => '/vila[\pP\s]?franca[\pP\s]?do[\pP\s]?campo/i', 'district_id' => $districtId],
            ['name' => 'Vila do Porto', 'regex' => '/vila[\pP\s]?do[\pP\s]?porto/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
