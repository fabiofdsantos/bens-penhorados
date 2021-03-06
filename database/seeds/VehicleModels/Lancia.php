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

class Lancia extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicle_makes')->where('name', 'Lancia')->pluck('id');

        $models = [
            ['name' => 'Beta', 'regex' => '/beta/i', 'make_id' => $makeId],
            ['name' => 'Dedra', 'regex' => '/dedra/i', 'make_id' => $makeId],
            ['name' => 'Delta', 'regex' => '/delta/i', 'make_id' => $makeId],
            ['name' => 'Flavia', 'regex' => '/flavia/i', 'make_id' => $makeId],
            ['name' => 'Fulvia', 'regex' => '/fulvia/i', 'make_id' => $makeId],
            ['name' => 'Kappa', 'regex' => '/kappa/i', 'make_id' => $makeId],
            ['name' => 'Lybra', 'regex' => '/lybra/i', 'make_id' => $makeId],
            ['name' => 'Musa', 'regex' => '/musa/i', 'make_id' => $makeId],
            ['name' => 'Phedra', 'regex' => '/phedra/i', 'make_id' => $makeId],
            ['name' => 'Prisma', 'regex' => '/prisma/i', 'make_id' => $makeId],
            ['name' => 'Thema', 'regex' => '/thema/i', 'make_id' => $makeId],
            ['name' => 'Thesis', 'regex' => '/thesis/i', 'make_id' => $makeId],
            ['name' => 'Ypsilon', 'regex' => '/ypsilon/i', 'make_id' => $makeId],
        ];

        DB::table('vehicle_models')->insert($models);
    }
}
