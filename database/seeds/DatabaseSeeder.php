<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Model::unguard();

        $this->call('LocationsTableSeeder');
        $this->call('ItemCategoriesTableSeeder');
        $this->call('VehicleColorsTableSeeder');
        $this->call('VehicleMakesTableSeeder');
        $this->call('VehicleModelsTableSeeder');
        $this->call('VehicleFuelsTableSeeder');
        $this->call('VehicleCategoriesTableSeeder');
        $this->call('VehicleTypesTableSeeder');
    }
}
