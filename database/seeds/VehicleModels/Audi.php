<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Audi extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Audi')->pluck('id');

        $models = [
            ['name' => '100', 'regex' => '/100/', 'make_id' => $makeId],
            ['name' => '50', 'regex' => '/50/', 'make_id' => $makeId],
            ['name' => '80', 'regex' => '/80/', 'make_id' => $makeId],
            ['name' => '90', 'regex' => '/90/', 'make_id' => $makeId],
            ['name' => 'A1', 'regex' => '/a1/i', 'make_id' => $makeId],
            ['name' => 'A1 Cabriolet', 'regex' => '/a1[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => 'A1 Sportback', 'regex' => '/a1[\pP\s]?sportback/i', 'make_id' => $makeId],
            ['name' => 'A2', 'regex' => '/a2/i', 'make_id' => $makeId],
            ['name' => 'A3', 'regex' => '/a3/i', 'make_id' => $makeId],
            ['name' => 'A3 Cabriolet', 'regex' => '/a3[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => 'A3 Sportback', 'regex' => '/a3[\pP\s]?sportback/i', 'make_id' => $makeId],
            ['name' => 'A4', 'regex' => '/a4/i', 'make_id' => $makeId],
            ['name' => 'A4 Allroad', 'regex' => '/a4[\pP\s]?allroad/i', 'make_id' => $makeId],
            ['name' => 'A4 Cabriolet', 'regex' => '/a4[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => 'A5', 'regex' => '/a5/i', 'make_id' => $makeId],
            ['name' => 'A5 Cabriolet', 'regex' => '/a5[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => 'A5 Sportback', 'regex' => '/a5[\pP\s]?sportback/i', 'make_id' => $makeId],
            ['name' => 'A6', 'regex' => '/a6/i', 'make_id' => $makeId],
            ['name' => 'A6 Allroad', 'regex' => '/a6[\pP\s]?allroad/i', 'make_id' => $makeId],
            ['name' => 'A7', 'regex' => '/a7/i', 'make_id' => $makeId],
            ['name' => 'A7 Sportback', 'regex' => '/a7[\pP\s]?sportback/i', 'make_id' => $makeId],
            ['name' => 'A8', 'regex' => '/a8/i', 'make_id' => $makeId],
            ['name' => 'Cabriolet', 'regex' => '/cabriolet/i', 'make_id' => $makeId],
            ['name' => 'Coupé', 'regex' => '/coupe/i', 'make_id' => $makeId],
            ['name' => 'Q3', 'regex' => '/q3/i', 'make_id' => $makeId],
            ['name' => 'Q5', 'regex' => '/q5/i', 'make_id' => $makeId],
            ['name' => 'Q7', 'regex' => '/q7/i', 'make_id' => $makeId],
            ['name' => 'Quattro', 'regex' => '/quattro/i', 'make_id' => $makeId],
            ['name' => 'R8 Coupé', 'regex' => '/r8[\pP\s]?coupe/i', 'make_id' => $makeId],
            ['name' => 'RS4', 'regex' => '/rs4/i', 'make_id' => $makeId],
            ['name' => 'RS6', 'regex' => '/rs6/i', 'make_id' => $makeId],
            ['name' => 'S3', 'regex' => '/s3/i', 'make_id' => $makeId],
            ['name' => 'S4', 'regex' => '/s4/i', 'make_id' => $makeId],
            ['name' => 'S5', 'regex' => '/s5/i', 'make_id' => $makeId],
            ['name' => 'TT', 'regex' => '/tt/i', 'make_id' => $makeId],
            ['name' => 'TT Roadster', 'regex' => '/tt[\pP\s]?roadster/i', 'make_id' => $makeId],
            ['name' => 'TTS', 'regex' => '/tts/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
