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
 * This is the portuguese municipalities table seeder class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class PtMunicipalitiesTableSeeder extends Seeder
{
    public function run()
    {
        foreach (glob(getcwd().'/database/seeds/Municipalities/*.php') as $file) {
            $filename = basename($file, '.php');
            $this->call('Municipalities\\'.$filename);
        }
    }
}
