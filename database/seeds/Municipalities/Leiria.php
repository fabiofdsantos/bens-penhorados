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

class Leiria extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '10')->pluck('id');

        $municipalities = [
            ['name' => 'Alvaiazere', 'regex' => '/alvaiazere/i', 'district_id' => $districtId],
            ['name' => 'Ansião', 'regex' => '/ansiao/i', 'district_id' => $districtId],
            ['name' => 'Batalha', 'regex' => '/batalha/i', 'district_id' => $districtId],
            ['name' => 'Bombarral', 'regex' => '/bombarral/i', 'district_id' => $districtId],
            ['name' => 'Caldas da Rainha', 'regex' => '/caldas[\pP\s]?da[\pP\s]?rainha/i', 'district_id' => $districtId],
            ['name' => 'Castanheira de Pera', 'regex' => '/castanheira[\pP\s]?de[\pP\s]?pera/i', 'district_id' => $districtId],
            ['name' => 'Figueiro dos Vinhos', 'regex' => '/figueiro[\pP\s]?dos[\pP\s]?vinhos/i', 'district_id' => $districtId],
            ['name' => 'Leiria', 'regex' => '/leiria/i', 'district_id' => $districtId],
            ['name' => 'Marinha Grande', 'regex' => '/marinha[\pP\s]?grande/i', 'district_id' => $districtId],
            ['name' => 'Nazare', 'regex' => '/nazare/i', 'district_id' => $districtId],
            ['name' => 'Obidos', 'regex' => '/obidos/i', 'district_id' => $districtId],
            ['name' => 'Pedrogão Grande', 'regex' => '/pedrogao[\pP\s]?grande/i', 'district_id' => $districtId],
            ['name' => 'Peniche', 'regex' => '/peniche/i', 'district_id' => $districtId],
            ['name' => 'Pombal', 'regex' => '/pombal/i', 'district_id' => $districtId],
            ['name' => 'Porto de Mos', 'regex' => '/porto[\pP\s]?de[\pP\s]?mos/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
