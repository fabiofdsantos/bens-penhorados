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

class Braganca extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '04')->pluck('id');

        $municipalities = [
            ['name' => 'Bragança', 'regex' => '/braganc[\pP\s]?a/i', 'district_id' => $districtId],
            ['name' => 'Carrazeda de Ansiães', 'regex' => '/carrazeda[\pP\s]?de[\pP\s]?ansiaes/i', 'district_id' => $districtId],
            ['name' => 'Freixo de Espada a Cinta', 'regex' => '/freixo[\pP\s]?de[\pP\s]?espada[\pP\s]?a[\pP\s]?cinta/i', 'district_id' => $districtId],
            ['name' => 'Macedo de Cavaleiros', 'regex' => '/macedo[\pP\s]?de[\pP\s]?cavaleiros/i', 'district_id' => $districtId],
            ['name' => 'Miranda do Douro', 'regex' => '/miranda[\pP\s]?do[\pP\s]?douro/i', 'district_id' => $districtId],
            ['name' => 'Mirandela', 'regex' => '/mirandela/i', 'district_id' => $districtId],
            ['name' => 'Mogadouro', 'regex' => '/mogadouro/i', 'district_id' => $districtId],
            ['name' => 'Torre de Moncorvo', 'regex' => '/torre[\pP\s]?de[\pP\s]?moncorvo/i', 'district_id' => $districtId],
            ['name' => 'Vila Flor', 'regex' => '/vila[\pP\s]?flor/i', 'district_id' => $districtId],
            ['name' => 'Vimioso', 'regex' => '/vimioso/i', 'district_id' => $districtId],
            ['name' => 'Vinhais', 'regex' => '/vinhais/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
