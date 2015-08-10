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

class ItemStatusesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('item_statuses')->delete();

        $types = [
            ['name' => 'Em curso', 'regex' => '/em curso/i'],
            ['name' => 'Suspenso', 'regex' => '/suspenso/i'],
            ['name' => 'Finalizado', 'regex' => null],
        ];

        DB::table('item_statuses')->insert($types);
    }
}
