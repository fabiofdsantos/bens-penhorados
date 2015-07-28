<?php

use Illuminate\Database\Seeder;

class ItemCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('item_categories')->delete();

        $categories = [
            ['name' => 'Veículos', 'slug' => 'veiculos', 'code' => '01'],
            ['name' => 'Imóveis', 'slug' => 'imoveis', 'code' => '02'],
            ['name' => 'Outros', 'slug' => 'outros', 'code' => '09'],
        ];

        DB::table('item_categories')->insert($categories);
    }
}
