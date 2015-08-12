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

class Setubal extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '15')->pluck('id');

        $municipalities = [
            ['name' => 'Alcacer do Sal', 'regex' => '/alcacer[\pP\s]?do[\pP\s]?sal/i', 'district_id' => $districtId],
            ['name' => 'Alcochete', 'regex' => '/alcochete/i', 'district_id' => $districtId],
            ['name' => 'Almada', 'regex' => '/almada/i', 'district_id' => $districtId],
            ['name' => 'Barreiro', 'regex' => '/barreiro/i', 'district_id' => $districtId],
            ['name' => 'Grandola', 'regex' => '/grandola/i', 'district_id' => $districtId],
            ['name' => 'Moita', 'regex' => '/moita/i', 'district_id' => $districtId],
            ['name' => 'Montijo', 'regex' => '/montijo/i', 'district_id' => $districtId],
            ['name' => 'Palmela', 'regex' => '/palmela/i', 'district_id' => $districtId],
            ['name' => 'Santiago do Cacem', 'regex' => '/santiago[\pP\s]?do[\pP\s]?cacem/i', 'district_id' => $districtId],
            ['name' => 'Seixal', 'regex' => '/seixal/i', 'district_id' => $districtId],
            ['name' => 'Sesimbra', 'regex' => '/sesimbra/i', 'district_id' => $districtId],
            ['name' => 'Setubal', 'regex' => '/setubal/i', 'district_id' => $districtId],
            ['name' => 'Sines', 'regex' => '/sines/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
