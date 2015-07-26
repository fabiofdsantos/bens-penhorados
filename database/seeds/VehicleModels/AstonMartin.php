<?php

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class AstonMartin extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Aston Martin')->pluck('id');

        $models = [
            ['name' => 'Cygnet', 'regex' => '/cygnet/i', 'make_id' => $makeId],
            ['name' => 'DB7', 'regex' => '/db7/i', 'make_id' => $makeId],
            ['name' => 'DB9', 'regex' => '/db9/i', 'make_id' => $makeId],
            ['name' => 'DBS', 'regex' => '/dbs/i', 'make_id' => $makeId],
            ['name' => 'V8', 'regex' => '/v8/i', 'make_id' => $makeId],
            ['name' => 'Vanquish', 'regex' => '/vanquish/i', 'make_id' => $makeId],
            ['name' => 'Vantage', 'regex' => '/vantage/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
