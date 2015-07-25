<?php

namespace VehiclesModels;

use DB;
use Illuminate\Database\Seeder;

class Volkswagen extends Seeder
{
    public function run()
    {
        $makeId = DB::table('vehicles_makes')->where('name', 'Volkswagen')->pluck('id');

        $models = [
            ['name' => 'Golf', 'regex' => '/golf/i', 'make_id' => $makeId],
            ['name' => 'Golf Cabriolet', 'regex' => '/golf[\pP\s]?cabriolet/i', 'make_id' => $makeId],
            ['name' => 'Golf I', 'regex' => '/golf[\pP\s]?i/i', 'make_id' => $makeId],
            ['name' => 'Golf II', 'regex' => '/golf[\pP\s]?ii/i', 'make_id' => $makeId],
            ['name' => 'Golf III', 'regex' => '/golf[\pP\s]?iii/i', 'make_id' => $makeId],
            ['name' => 'Golf IV', 'regex' => '/golf[\pP\s]?iv/i', 'make_id' => $makeId],
            ['name' => 'Golf Plus', 'regex' => '/golf[\pP\s]?plus/i', 'make_id' => $makeId],
            ['name' => 'Golf Sportsvan', 'regex' => '/golf[\pP\s]?sportsvan/i', 'make_id' => $makeId],
            ['name' => 'Golf V', 'regex' => '/golf[\pP\s]?v/i', 'make_id' => $makeId],
            ['name' => 'Golf VI', 'regex' => '/golf[\pP\s]?vi/i', 'make_id' => $makeId],
            ['name' => 'Golf VII', 'regex' => '/golf[\pP\s]?vii/i', 'make_id' => $makeId],
            ['name' => 'Amarok', 'regex' => '/amarok/i', 'make_id' => $makeId],
            ['name' => 'Beetle', 'regex' => '/beetle/i', 'make_id' => $makeId],
            ['name' => 'Bora', 'regex' => '/bora/i', 'make_id' => $makeId],
            ['name' => 'Buggy', 'regex' => '/buggy/i', 'make_id' => $makeId],
            ['name' => 'Caddy', 'regex' => '/caddy/i', 'make_id' => $makeId],
            ['name' => 'California', 'regex' => '/california/i', 'make_id' => $makeId],
            ['name' => 'Caravelle', 'regex' => '/caravelle/i', 'make_id' => $makeId],
            ['name' => 'Corrado', 'regex' => '/corrado/i', 'make_id' => $makeId],
            ['name' => 'Crafter', 'regex' => '/crafter/i', 'make_id' => $makeId],
            ['name' => 'Eos', 'regex' => '/eos/i', 'make_id' => $makeId],
            ['name' => 'Fox', 'regex' => '/fox/i', 'make_id' => $makeId],
            ['name' => 'Jetta', 'regex' => '/jetta/i', 'make_id' => $makeId],
            ['name' => 'Karmann Ghia', 'regex' => '/karmann[\pP\s]?ghia/i', 'make_id' => $makeId],
            ['name' => 'LT', 'regex' => '/lt/i', 'make_id' => $makeId],
            ['name' => 'Lupo', 'regex' => '/lupo/i', 'make_id' => $makeId],
            ['name' => 'Multivan', 'regex' => '/multivan/i', 'make_id' => $makeId],
            ['name' => 'Passat', 'regex' => '/passat/i', 'make_id' => $makeId],
            ['name' => 'Passat CC', 'regex' => '/passat[\pP\s]?cc/i', 'make_id' => $makeId],
            ['name' => 'Phaeton', 'regex' => '/phaeton/i', 'make_id' => $makeId],
            ['name' => 'Polo', 'regex' => '/polo/i', 'make_id' => $makeId],
            ['name' => 'Polo Cross', 'regex' => '/polo[\pP\s]?cross/i', 'make_id' => $makeId],
            ['name' => 'Scirocco', 'regex' => '/scirocco/i', 'make_id' => $makeId],
            ['name' => 'Sharan', 'regex' => '/sharan/i', 'make_id' => $makeId],
            ['name' => 'Shuttle', 'regex' => '/shuttle/i', 'make_id' => $makeId],
            ['name' => 'Tiguan', 'regex' => '/tiguan/i', 'make_id' => $makeId],
            ['name' => 'Touareg', 'regex' => '/touareg/i', 'make_id' => $makeId],
            ['name' => 'Touran', 'regex' => '/touran/i', 'make_id' => $makeId],
            ['name' => 'Transporter', 'regex' => '/transporter/i', 'make_id' => $makeId],
            ['name' => 'UP!', 'regex' => '/up[\pP\s]?/i', 'make_id' => $makeId],
            ['name' => 'Vento', 'regex' => '/vento/i', 'make_id' => $makeId],
        ];

        DB::table('vehicles_models')->insert($models);
    }
}
