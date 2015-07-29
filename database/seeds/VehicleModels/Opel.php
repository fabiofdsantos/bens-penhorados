<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Opel extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Opel')->pluck('id');

        $models = [
            ['name' => 'Adam', 'regex' => '/adam/i', 'make_id' => $makeId],
            ['name' => 'Agila', 'regex' => '/agila/i', 'make_id' => $makeId],
            ['name' => 'Ampera', 'regex' => '/ampera/i', 'make_id' => $makeId],
            ['name' => 'Antara', 'regex' => '/antara/i', 'make_id' => $makeId],
            ['name' => 'Arena', 'regex' => '/arena/i', 'make_id' => $makeId],
            ['name' => 'Ascona', 'regex' => '/ascona/i', 'make_id' => $makeId],
            ['name' => 'Astra', 'regex' => '/astra/i', 'make_id' => $makeId],
            ['name' => 'Astra Cabriolet', 'regex' => '/astra[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => 'Astra Classic', 'regex' => '/astra[\pP\s]?classic/i', 'make_id' => $makeId],
            ['name' => 'Blitz', 'regex' => '/blitz/i', 'make_id' => $makeId],
            ['name' => 'Calibra', 'regex' => '/calibra/i', 'make_id' => $makeId],
            ['name' => 'Campo', 'regex' => '/campo/i', 'make_id' => $makeId],
            ['name' => 'Cascada', 'regex' => '/cascada/i', 'make_id' => $makeId],
            ['name' => 'Combo', 'regex' => '/combo/i', 'make_id' => $makeId],
            ['name' => 'Commodore', 'regex' => '/commodore/i', 'make_id' => $makeId],
            ['name' => 'Corsa', 'regex' => '/corsa/i', 'make_id' => $makeId],
            ['name' => 'Frontera', 'regex' => '/frontera/i', 'make_id' => $makeId],
            ['name' => 'GT', 'regex' => '/gt/i', 'make_id' => $makeId],
            ['name' => 'Insignia', 'regex' => '/insignia/i', 'make_id' => $makeId],
            ['name' => 'Kadett', 'regex' => '/kadett/i', 'make_id' => $makeId],
            ['name' => 'Kapitän', 'regex' => '/kapitan/i', 'make_id' => $makeId],
            ['name' => 'Manta', 'regex' => '/manta/i', 'make_id' => $makeId],
            ['name' => 'Meriva', 'regex' => '/meriva/i', 'make_id' => $makeId],
            ['name' => 'Mokka', 'regex' => '/mokka/i', 'make_id' => $makeId],
            ['name' => 'Monterey', 'regex' => '/monterey/i', 'make_id' => $makeId],
            ['name' => 'Movano', 'regex' => '/movano/i', 'make_id' => $makeId],
            ['name' => 'Omega', 'regex' => '/omega/i', 'make_id' => $makeId],
            ['name' => 'Rekord', 'regex' => '/rekord/i', 'make_id' => $makeId],
            ['name' => 'Signum', 'regex' => '/signum/i', 'make_id' => $makeId],
            ['name' => 'Tigra', 'regex' => '/tigra/i', 'make_id' => $makeId],
            ['name' => 'Vectra', 'regex' => '/vectra/i', 'make_id' => $makeId],
            ['name' => 'Vivaro', 'regex' => '/vivaro/i', 'make_id' => $makeId],
            ['name' => 'Zafira', 'regex' => '/zafira/i', 'make_id' => $makeId],
            ['name' => 'Zafira Tourer', 'regex' => '/zafira[\pP\s]?tourer/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
