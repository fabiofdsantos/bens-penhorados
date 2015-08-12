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

class Portalegre extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '12')->pluck('id');

        $municipalities = [
            ['name' => 'Alter do Chão', 'regex' => '/alter[\pP\s]?do[\pP\s]?chao/i', 'district_id' => $districtId],
            ['name' => 'Arronches', 'regex' => '/arronches/i', 'district_id' => $districtId],
            ['name' => 'Avis', 'regex' => '/avis/i', 'district_id' => $districtId],
            ['name' => 'Campo Maior', 'regex' => '/campo[\pP\s]?maior/i', 'district_id' => $districtId],
            ['name' => 'Castelo de Vide', 'regex' => '/castelo[\pP\s]?de[\pP\s]?vide/i', 'district_id' => $districtId],
            ['name' => 'Crato', 'regex' => '/crato/i', 'district_id' => $districtId],
            ['name' => 'Elvas', 'regex' => '/elvas/i', 'district_id' => $districtId],
            ['name' => 'Fronteira', 'regex' => '/fronteira/i', 'district_id' => $districtId],
            ['name' => 'Gavião', 'regex' => '/gaviao/i', 'district_id' => $districtId],
            ['name' => 'Marvão', 'regex' => '/marvao/i', 'district_id' => $districtId],
            ['name' => 'Monforte', 'regex' => '/monforte/i', 'district_id' => $districtId],
            ['name' => 'Nisa', 'regex' => '/nisa/i', 'district_id' => $districtId],
            ['name' => 'Ponte de Sor', 'regex' => '/ponte[\pP\s]?de[\pP\s]?sor/i', 'district_id' => $districtId],
            ['name' => 'Portalegre', 'regex' => '/portalegre/i', 'district_id' => $districtId],
            ['name' => 'Sousel', 'regex' => '/sousel/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
