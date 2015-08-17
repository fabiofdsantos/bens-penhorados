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

/**
 * This is the database seeder class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Model::unguard();

        $this->call('PtDistrictsTableSeeder');
        $this->call('PtMunicipalitiesTableSeeder');
        $this->call('ItemTaxOfficesTableSeeder');
        $this->call('ItemCategoriesTableSeeder');
        $this->call('ItemStatusesTableSeeder');
        $this->call('ItemPurchaseTypesSeeder');
        $this->call('VehicleColorsTableSeeder');
        $this->call('VehicleMakesTableSeeder');
        $this->call('VehicleModelsTableSeeder');
        $this->call('VehicleFuelsTableSeeder');
        $this->call('VehicleCategoriesTableSeeder');
        $this->call('VehicleTypesTableSeeder');
        $this->call('PropertyLandRegistryTableSeeder');
    }
}
