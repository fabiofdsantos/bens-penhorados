<?php

use Illuminate\Database\Seeder;

class VehicleTypesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehicle_types')->delete();

        $types = [
            ['name' => 'Mercadorias', 'regex' => '/\\bmercadorias\b/i'],
            ['name' => 'Passageiros', 'regex' => '/\\bpassageiros\b/i'],
        ];

        DB::table('vehicle_types')->insert($types);
    }
}
