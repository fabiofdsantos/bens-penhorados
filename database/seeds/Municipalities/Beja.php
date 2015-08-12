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

class Beja extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '02')->pluck('id');

        $municipalities = [
            ['name' => 'Aljustrel', 'regex' => '/aljustrel/i', 'district_id' => $districtId],
            ['name' => 'Almodovar', 'regex' => '/almodovar/i', 'district_id' => $districtId],
            ['name' => 'Alvito', 'regex' => '/alvito/i', 'district_id' => $districtId],
            ['name' => 'Barrancos', 'regex' => '/barrancos/i', 'district_id' => $districtId],
            ['name' => 'Beja', 'regex' => '/beja/i', 'district_id' => $districtId],
            ['name' => 'Castro Verde', 'regex' => '/castro[\pP\s]?verde/i', 'district_id' => $districtId],
            ['name' => 'Cuba', 'regex' => '/cuba/i', 'district_id' => $districtId],
            ['name' => 'Ferreira do Alentejo', 'regex' => '/ferreira[\pP\s]?do[\pP\s]?alentejo/i', 'district_id' => $districtId],
            ['name' => 'Mertola', 'regex' => '/mertola/i', 'district_id' => $districtId],
            ['name' => 'Moura', 'regex' => '/moura/i', 'district_id' => $districtId],
            ['name' => 'Odemira', 'regex' => '/odemira/i', 'district_id' => $districtId],
            ['name' => 'Ourique', 'regex' => '/ourique/i', 'district_id' => $districtId],
            ['name' => 'Serpa', 'regex' => '/serpa/i', 'district_id' => $districtId],
            ['name' => 'Vidigueira', 'regex' => '/vidigueira/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
