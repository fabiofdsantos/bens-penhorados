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

class Funchal extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '22')->pluck('id');

        $municipalities = [
            ['name' => 'Calheta (Madeira)', 'regex' => '/calheta[\pP\s]?[\pP\s]?madeira[\pP\s]?/i', 'district_id' => $districtId],
            ['name' => 'Camara de Lobos', 'regex' => '/camara[\pP\s]?de[\pP\s]?lobos/i', 'district_id' => $districtId],
            ['name' => 'Funchal', 'regex' => '/funchal/i', 'district_id' => $districtId],
            ['name' => 'Machico', 'regex' => '/machico/i', 'district_id' => $districtId],
            ['name' => 'Ponta do Sol', 'regex' => '/ponta[\pP\s]?do[\pP\s]?sol/i', 'district_id' => $districtId],
            ['name' => 'Porto Moniz', 'regex' => '/porto[\pP\s]?moniz/i', 'district_id' => $districtId],
            ['name' => 'Porto Santo', 'regex' => '/porto[\pP\s]?santo/i', 'district_id' => $districtId],
            ['name' => 'Ribeira Brava', 'regex' => '/ribeira[\pP\s]?brava/i', 'district_id' => $districtId],
            ['name' => 'Santa Cruz', 'regex' => '/santa[\pP\s]?cruz/i', 'district_id' => $districtId],
            ['name' => 'Santana', 'regex' => '/santana/i', 'district_id' => $districtId],
            ['name' => 'S. Vicente', 'regex' => '/s[\pP\s]?[\pP\s]?vicente/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
