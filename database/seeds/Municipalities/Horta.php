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

class Horta extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '20')->pluck('id');

        $municipalities = [
            ['name' => 'Horta', 'regex' => '/horta/i', 'district_id' => $districtId],
            ['name' => 'Lajes das Flores', 'regex' => '/lajes[\pP\s]?das[\pP\s]?flores/i', 'district_id' => $districtId],
            ['name' => 'Lajes do Pico', 'regex' => '/lajes[\pP\s]?do[\pP\s]?pico/i', 'district_id' => $districtId],
            ['name' => 'Madalena', 'regex' => '/madalena/i', 'district_id' => $districtId],
            ['name' => 'Santa Cruz das Flores', 'regex' => '/santa[\pP\s]?cruz[\pP\s]?das[\pP\s]?flores/i', 'district_id' => $districtId],
            ['name' => 'S. Roque do Pico', 'regex' => '/s[\pP\s]?[\pP\s]?roque[\pP\s]?do[\pP\s]?pico/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
