<?php

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
        $this->call('RawDataCategoriesTableSeeder');
        $this->call('VehicleColorsTableSeeder');
        $this->call('VehicleMakesTableSeeder');
        $this->call('VehicleModelsTableSeeder');
        $this->call('VehicleFuelsTableSeeder');
        $this->call('VehicleCategoriesTableSeeder');
        $this->call('VehicleTypesTableSeeder');
    }
}
