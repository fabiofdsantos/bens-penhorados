<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Renault extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Renault')->pluck('id');

        $models = [
            ['name' => 'Clio', 'regex' => '/clio/i', 'make_id' => $makeId],
            ['name' => 'Clio GT', 'regex' => '/clio[\pP\s]?gt/i', 'make_id' => $makeId],
            ['name' => 'Clio II', 'regex' => '/clio[\pP\s]?ii/i', 'make_id' => $makeId],
            ['name' => 'Clio III', 'regex' => '/clio[\pP\s]?iii/i', 'make_id' => $makeId],
            ['name' => 'Clio IV', 'regex' => '/clio[\pP\s]?iv/i', 'make_id' => $makeId],
            ['name' => 'Espace', 'regex' => '/espace/i', 'make_id' => $makeId],
            ['name' => 'Grand Espace', 'regex' => '/grand[\pP\s]?espace/i', 'make_id' => $makeId],
            ['name' => 'Grand Modus', 'regex' => '/grand[\pP\s]?modus/i', 'make_id' => $makeId],
            ['name' => 'Modus', 'regex' => '/modus/i', 'make_id' => $makeId],
            ['name' => 'Grand Scénic', 'regex' => '/grand[\pP\s]?sc[eéèêẽë]nic/iu', 'make_id' => $makeId],
            ['name' => 'Grand Scénic II', 'regex' => '/grand[\pP\s]?sc[eéèêẽë]nic[\pP\s]?ii/iu', 'make_id' => $makeId],
            ['name' => 'Grand Scénic III', 'regex' => '/grand[\pP\s]?sc[eéèêẽë]nic[\pP\s]?iii/iu', 'make_id' => $makeId],
            ['name' => 'Scénic', 'regex' => '/sc[eéèêẽë]nic/iu', 'make_id' => $makeId],
            ['name' => 'Scénic II', 'regex' => '/sc[eéèêẽë]nic[\pP\s]?ii/iu', 'make_id' => $makeId],
            ['name' => 'Scénic III', 'regex' => '/sc[eéèêẽë]nic[\pP\s]?iii/iu', 'make_id' => $makeId],
            ['name' => 'Scénic Xmod', 'regex' => '/sc[eéèêẽë]nic[\pP\s]?xmod/iu', 'make_id' => $makeId],
            ['name' => 'Laguna', 'regex' => '/laguna/i', 'make_id' => $makeId],
            ['name' => 'Laguna Coupé', 'regex' => '/laguna[\pP\s]?coup[eéèêẽë]/iu', 'make_id' => $makeId],
            ['name' => 'Laguna II', 'regex' => '/laguna[\pP\s]?ii/i', 'make_id' => $makeId],
            ['name' => 'Laguna III', 'regex' => '/laguna[\pP\s]?iii/i', 'make_id' => $makeId],
            ['name' => 'Mégane', 'regex' => '/m[eéèêẽë]gane/iu', 'make_id' => $makeId],
            ['name' => 'Mégane Cabriolet', 'regex' => '/m[eéèêẽë]gane[\pP\s]?cabriolet/iu', 'make_id' => $makeId],
            ['name' => 'Mégane Coupé', 'regex' => '/m[eéèêẽë]gane[\pP\s]?coup[eéèêẽë]/iu', 'make_id' => $makeId],
            ['name' => 'Mégane GT', 'regex' => '/m[eéèêẽë]gane[\pP\s]?gt/iu', 'make_id' => $makeId],
            ['name' => 'Mégane II', 'regex' => '/m[eéèêẽë]gane[\pP\s]?ii/iu', 'make_id' => $makeId],
            ['name' => 'Mégane III', 'regex' => '/m[eéèêẽë]gane[\pP\s]?iii/iu', 'make_id' => $makeId],
            ['name' => 'R4', 'regex' => '/r4/i', 'make_id' => $makeId],
            ['name' => 'R5', 'regex' => '/r5/i', 'make_id' => $makeId],
            ['name' => '19', 'regex' => '/19/', 'make_id' => $makeId],
            ['name' => 'Avantime', 'regex' => '/avantime/i', 'make_id' => $makeId],
            ['name' => 'Captur', 'regex' => '/captur/i', 'make_id' => $makeId],
            ['name' => 'Express', 'regex' => '/express/i', 'make_id' => $makeId],
            ['name' => 'Fluence', 'regex' => '/fluence/i', 'make_id' => $makeId],
            ['name' => 'Kangoo', 'regex' => '/kangoo/i', 'make_id' => $makeId],
            ['name' => 'Koleos', 'regex' => '/koleos/i', 'make_id' => $makeId],
            ['name' => 'Master', 'regex' => '/master/i', 'make_id' => $makeId],
            ['name' => 'Rapid', 'regex' => '/rapid/i', 'make_id' => $makeId],
            ['name' => 'Safrane', 'regex' => '/safrane/i', 'make_id' => $makeId],
            ['name' => 'Trafic', 'regex' => '/trafic/i', 'make_id' => $makeId],
            ['name' => 'Twingo', 'regex' => '/twingo/i', 'make_id' => $makeId],
            ['name' => 'Twizy', 'regex' => '/twizy/i', 'make_id' => $makeId],
            ['name' => 'Vel Satis', 'regex' => '/vel[\pP\s]?satis/i', 'make_id' => $makeId],
            ['name' => 'Zoe', 'regex' => '/zoe/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
