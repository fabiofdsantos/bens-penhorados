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

class Coimbra extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '06')->pluck('id');

        $municipalities = [
            ['name' => 'Cantanhede', 'regex' => '/cantanhede/i', 'district_id' => $districtId],
            ['name' => 'Coimbra', 'regex' => '/coimbra/i', 'district_id' => $districtId],
            ['name' => 'Condeixa-a-Nova', 'regex' => '/condeixa[\pP\s]?a[\pP\s]?nova/i', 'district_id' => $districtId],
            ['name' => 'Figueira da Foz', 'regex' => '/figueira[\pP\s]?da[\pP\s]?foz/i', 'district_id' => $districtId],
            ['name' => 'Gois', 'regex' => '/gois/i', 'district_id' => $districtId],
            ['name' => 'Lousã', 'regex' => '/lousa/i', 'district_id' => $districtId],
            ['name' => 'Mira', 'regex' => '/mira/i', 'district_id' => $districtId],
            ['name' => 'Miranda do Corvo', 'regex' => '/miranda[\pP\s]?do[\pP\s]?corvo/i', 'district_id' => $districtId],
            ['name' => 'Montemor-o-Velho', 'regex' => '/montemor[\pP\s]?o[\pP\s]?velho/i', 'district_id' => $districtId],
            ['name' => 'Oliveira do Hospital', 'regex' => '/oliveira[\pP\s]?do[\pP\s]?hospital/i', 'district_id' => $districtId],
            ['name' => 'Pampilhosa da Serra', 'regex' => '/pampilhosa[\pP\s]?da[\pP\s]?serra/i', 'district_id' => $districtId],
            ['name' => 'Penacova', 'regex' => '/penacova/i', 'district_id' => $districtId],
            ['name' => 'Penela', 'regex' => '/penela/i', 'district_id' => $districtId],
            ['name' => 'Soure', 'regex' => '/soure/i', 'district_id' => $districtId],
            ['name' => 'Tabua', 'regex' => '/tabua/i', 'district_id' => $districtId],
            ['name' => 'Vila Nova de Poiares', 'regex' => '/vila[\pP\s]?nova[\pP\s]?de[\pP\s]?poiares/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
