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

class Santarem extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '14')->pluck('id');

        $municipalities = [
            ['name' => 'Alcanena', 'regex' => '/alcanena/i', 'district_id' => $districtId],
            ['name' => 'Almeirim', 'regex' => '/almeirim/i', 'district_id' => $districtId],
            ['name' => 'Alpiarça', 'regex' => '/alpiarc[\pP\s]?a/i', 'district_id' => $districtId],
            ['name' => 'Benavente', 'regex' => '/benavente/i', 'district_id' => $districtId],
            ['name' => 'Cartaxo', 'regex' => '/cartaxo/i', 'district_id' => $districtId],
            ['name' => 'Chamusca', 'regex' => '/chamusca/i', 'district_id' => $districtId],
            ['name' => 'Constancia', 'regex' => '/constancia/i', 'district_id' => $districtId],
            ['name' => 'Coruche', 'regex' => '/coruche/i', 'district_id' => $districtId],
            ['name' => 'Entroncamento', 'regex' => '/entroncamento/i', 'district_id' => $districtId],
            ['name' => 'Ferreira do Zezere', 'regex' => '/ferreira[\pP\s]?do[\pP\s]?zezere/i', 'district_id' => $districtId],
            ['name' => 'Golegã', 'regex' => '/golega/i', 'district_id' => $districtId],
            ['name' => 'Mação', 'regex' => '/mac[\pP\s]?ao/i', 'district_id' => $districtId],
            ['name' => 'Rio Maior', 'regex' => '/rio[\pP\s]?maior/i', 'district_id' => $districtId],
            ['name' => 'Salvaterra de Magos', 'regex' => '/salvaterra[\pP\s]?de[\pP\s]?magos/i', 'district_id' => $districtId],
            ['name' => 'Santarem', 'regex' => '/santarem/i', 'district_id' => $districtId],
            ['name' => 'Sardoal', 'regex' => '/sardoal/i', 'district_id' => $districtId],
            ['name' => 'Tomar', 'regex' => '/tomar/i', 'district_id' => $districtId],
            ['name' => 'Torres Novas', 'regex' => '/torres[\pP\s]?novas/i', 'district_id' => $districtId],
            ['name' => 'Vila Nova da Barquinha', 'regex' => '/vila[\pP\s]?nova[\pP\s]?da[\pP\s]?barquinha/i', 'district_id' => $districtId],
            ['name' => 'Ourem', 'regex' => '/ourem/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
