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

/**
 * This is the property land registry table seeder class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class PropertyLandRegistryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('property_land_registry')->delete();

        $types = [
            ['name' => 'Rústico', 'regex' => '/\brustic[oa]\b/i'],
            ['name' => 'Urbano', 'regex' => '/\burban[oa]\b/i'],
            ['name' => 'Misto', 'regex' => '/\bmist[oa]\b/'],
        ];

        DB::table('property_land_registry')->insert($types);
    }
}
