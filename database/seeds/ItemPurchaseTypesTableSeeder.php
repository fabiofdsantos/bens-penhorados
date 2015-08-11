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

class ItemPurchaseTypesSeeder extends Seeder
{
    public function run()
    {
        DB::table('item_purchase_types')->delete();

        $types = [
            ['name' => 'Proposta em carta fechada', 'regex' => '/carta/i'],
            ['name' => 'Negociação particular', 'regex' => '/particular/i'],
            ['name' => 'Leilão eletrónico', 'regex' => '/leilao/i'],
        ];

        DB::table('item_purchase_types')->insert($types);
    }
}
