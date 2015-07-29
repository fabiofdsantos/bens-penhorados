<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace VehicleModels;

use DB;
use Illuminate\Database\Seeder;

class Mini extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Mini')->pluck('id');

        $models = [
            ['name' => 'Clubman', 'regex' => '/clubman/i', 'make_id' => $makeId],
            ['name' => 'Clubman Cooper S', 'regex' => '/clubman[\pP\s]?cooper[\pP\s]?s/i', 'make_id' => $makeId],
            ['name' => 'Clubman One', 'regex' => '/clubman[\pP\s]?one/i', 'make_id' => $makeId],
            ['name' => 'Cooper', 'regex' => '/cooper/i', 'make_id' => $makeId],
            ['name' => 'Cooper Cabriolet', 'regex' => '/cooper[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => 'Cooper S', 'regex' => '/cooper[\pP\s]?s/i', 'make_id' => $makeId],
            ['name' => 'Cooper S Cabriolet', 'regex' => '/cooper[\pP\s]?s[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => 'Cooper S Works', 'regex' => '/cooper[\pP\s]?s[\pP\s]?works/i', 'make_id' => $makeId],
            ['name' => 'Countryman', 'regex' => '/countryman/i', 'make_id' => $makeId],
            ['name' => 'Countryman Cooper', 'regex' => '/countryman[\pP\s]?cooper/i', 'make_id' => $makeId],
            ['name' => 'Countryman One', 'regex' => '/countryman[\pP\s]?one/i', 'make_id' => $makeId],
            ['name' => 'One', 'regex' => '/one/i', 'make_id' => $makeId],
            ['name' => 'One Cabriolet', 'regex' => '/one[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => 'Countryman', 'regex' => '/countryman/i', 'make_id' => $makeId],
            ['name' => 'Coupé', 'regex' => '/coupe/i', 'make_id' => $makeId],
            ['name' => 'Paceman', 'regex' => '/paceman/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
