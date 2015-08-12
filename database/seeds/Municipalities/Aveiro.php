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

class Aveiro extends Seeder
{
    public function run()
    {
        $districtId = DB::table('pt_districts')->where('code', '01')->pluck('id');

        $municipalities = [
            ['name' => 'Agueda', 'regex' => '/agueda/i', 'district_id' => $districtId],
            ['name' => 'Albergaria-a-Velha', 'regex' => '/albergaria[\pP\s]?a[\pP\s]?velha/i', 'district_id' => $districtId],
            ['name' => 'Anadia', 'regex' => '/anadia/i', 'district_id' => $districtId],
            ['name' => 'Arouca', 'regex' => '/arouca/i', 'district_id' => $districtId],
            ['name' => 'Aveiro', 'regex' => '/aveiro/i', 'district_id' => $districtId],
            ['name' => 'Castelo de Paiva', 'regex' => '/castelo[\pP\s]?de[\pP\s]?paiva/i', 'district_id' => $districtId],
            ['name' => 'Espinho', 'regex' => '/espinho/i', 'district_id' => $districtId],
            ['name' => 'Estarreja', 'regex' => '/estarreja/i', 'district_id' => $districtId],
            ['name' => 'Santa Maria da Feira', 'regex' => '/santa[\pP\s]?maria[\pP\s]?da[\pP\s]?feira/i', 'district_id' => $districtId],
            ['name' => 'Ilhavo', 'regex' => '/ilhavo/i', 'district_id' => $districtId],
            ['name' => 'Mealhada', 'regex' => '/mealhada/i', 'district_id' => $districtId],
            ['name' => 'Murtosa', 'regex' => '/murtosa/i', 'district_id' => $districtId],
            ['name' => 'Oliveira de Azemeis', 'regex' => '/oliveira[\pP\s]?de[\pP\s]?azemeis/i', 'district_id' => $districtId],
            ['name' => 'Oliveira do Bairro', 'regex' => '/oliveira[\pP\s]?do[\pP\s]?bairro/i', 'district_id' => $districtId],
            ['name' => 'Ovar', 'regex' => '/ovar/i', 'district_id' => $districtId],
            ['name' => 'S. João da Madeira', 'regex' => '/s[\pP\s]?[\pP\s]?joao[\pP\s]?da[\pP\s]?madeira/i', 'district_id' => $districtId],
            ['name' => 'Sever do Vouga', 'regex' => '/sever[\pP\s]?do[\pP\s]?vouga/i', 'district_id' => $districtId],
            ['name' => 'Vagos', 'regex' => '/vagos/i', 'district_id' => $districtId],
            ['name' => 'Vale de Cambra', 'regex' => '/vale[\pP\s]?de[\pP\s]?cambra/i', 'district_id' => $districtId],
        ];

        DB::table('pt_municipalities')->insert($municipalities);
    }
}
