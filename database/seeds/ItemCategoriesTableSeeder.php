<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Seeder;

class ItemCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('item_categories')->delete();

        $categories = [
            ['name' => 'Veículos', 'slug' => 'veiculos', 'code' => '01'],
            ['name' => 'Imóveis', 'slug' => 'imoveis', 'code' => '02'],
            ['name' => 'Participações sociais', 'slug' => 'part-sociais', 'code' => '05'],
            ['name' => 'Outros', 'slug' => 'outros', 'code' => '09'],
        ];

        DB::table('item_categories')->insert($categories);
    }
}
