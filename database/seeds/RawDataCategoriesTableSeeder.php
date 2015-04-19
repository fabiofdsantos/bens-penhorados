<?php

use Illuminate\Database\Seeder;

class RawDataCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('raw_data_categories')->truncate();

        $categories = [
            ['name' => 'vehicles', 'code' => '01'],
            ['name' => 'real-estates', 'code' => '02'],
            //['name' => 'social-quotas', 'code' => '05'],
            //['name' => 'shops', 'code' => '08'],
            ['name' => 'others', 'code' => '09'],
        ];

        DB::table('raw_data_categories')->insert($categories);
    }
}
