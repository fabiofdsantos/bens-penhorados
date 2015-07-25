<?php

use Illuminate\Database\Seeder;

class VehiclesTypesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehicles_types')->delete();

        $types = [
            ['name' => 'Mercadorias', 'regex' => '/\\bmercadorias\b/i'],
            ['name' => 'Passageiros', 'regex' => '/\\bpassageiros\b/i'],
        ];

        DB::table('vehicles_types')->insert($types);
    }
}
