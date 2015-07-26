<?php

use Illuminate\Database\Seeder;

class VehicleMakesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehicle_makes')->delete();

        $makes = [
            ['name' => 'Abarth', 'regex' => '/abarth/i'],
            ['name' => 'Acura', 'regex' => '/acura/i'],
            ['name' => 'Alfa Romeo', 'regex' => '/alfa[\pP\s]?romeo/i'],
            ['name' => 'Aston Martin', 'regex' => '/aston[\pP\s]?martin/i'],
            ['name' => 'Audi', 'regex' => '/audi/i'],
            ['name' => 'Austin', 'regex' => '/austin/i'],
            ['name' => 'Bentley', 'regex' => '/bentley/i'],
            ['name' => 'BMW', 'regex' => '/bmw/i'],
            ['name' => 'Cadillac', 'regex' => '/cadillac/i'],
            ['name' => 'Chevrolet', 'regex' => '/chevrolet/i'],
            ['name' => 'Chrysler', 'regex' => '/chrysler/i'],
            ['name' => 'Citroën', 'regex' => '/citroen/i'],
            ['name' => 'Corvette', 'regex' => '/corvette/i'],
            ['name' => 'Dacia', 'regex' => '/dacia/i'],
            ['name' => 'Daihatsu', 'regex' => '/daihatsu/i'],
            ['name' => 'Dodge', 'regex' => '/dodge/i'],
            ['name' => 'Ferrari', 'regex' => '/ferrari/i'],
            ['name' => 'Fiat', 'regex' => '/fiat/i'],
            ['name' => 'Ford', 'regex' => '/ford/i'],
            ['name' => 'Honda', 'regex' => '/honda/i'],
            ['name' => 'Hummer', 'regex' => '/hummer/i'],
            ['name' => 'Hyundai', 'regex' => '/hyundai/i'],
            ['name' => 'Isuzu', 'regex' => '/isuzu/i'],
            ['name' => 'Iveco', 'regex' => '/iveco/i'],
            ['name' => 'Jaguar', 'regex' => '/jaguar/i'],
            ['name' => 'Jeep', 'regex' => '/jeep/i'],
            ['name' => 'Kia', 'regex' => '/kia/i'],
            ['name' => 'Lada', 'regex' => '/lada/i'],
            ['name' => 'Lamborghini', 'regex' => '/lamborghini/i'],
            ['name' => 'Lancia', 'regex' => '/lancia/i'],
            ['name' => 'Land Rover', 'regex' => '/land[\pP\s]?rover/i'],
            ['name' => 'Lexus', 'regex' => '/lexus/i'],
            ['name' => 'Lincoln', 'regex' => '/lincoln/i'],
            ['name' => 'Lotus', 'regex' => '/lotus/i'],
            ['name' => 'Maserati', 'regex' => '/maserati/i'],
            ['name' => 'Maybach', 'regex' => '/maybach/i'],
            ['name' => 'Mazda', 'regex' => '/mazda/i'],
            ['name' => 'Mercedes', 'regex' => '/mercedes/i'],
            ['name' => 'MG', 'regex' => '/mg/i'],
            ['name' => 'Mini', 'regex' => '/mini/i'],
            ['name' => 'Mitsubishi', 'regex' => '/mitsubishi/i'],
            ['name' => 'Morgan', 'regex' => '/morgan/i'],
            ['name' => 'Nissan', 'regex' => '/nissan/i'],
            ['name' => 'Opel', 'regex' => '/opel/i'],
            ['name' => 'Peugeot', 'regex' => '/peugeot/i'],
            ['name' => 'Piaggio', 'regex' => '/piaggio/i'],
            ['name' => 'Pontiac', 'regex' => '/pontiac/i'],
            ['name' => 'Porsche', 'regex' => '/porsche/i'],
            ['name' => 'Renault', 'regex' => '/renault/i'],
            ['name' => 'Rolls Royce', 'regex' => '/rolls[\pP\s]?royce/i'],
            ['name' => 'Rover', 'regex' => '/rover/i'],
            ['name' => 'Saab', 'regex' => '/saab/i'],
            ['name' => 'Seat', 'regex' => '/seat/i'],
            ['name' => 'Skoda', 'regex' => '/skoda/i'],
            ['name' => 'Smart', 'regex' => '/smart/i'],
            ['name' => 'Ssangyong', 'regex' => '/ssangyong/i'],
            ['name' => 'Subaru', 'regex' => '/subaru/i'],
            ['name' => 'Suzuki', 'regex' => '/suzuki/i'],
            ['name' => 'Tata', 'regex' => '/tata/i'],
            ['name' => 'Toyota', 'regex' => '/toyota/i'],
            ['name' => 'Triumph', 'regex' => '/triumph/i'],
            ['name' => 'Volvo', 'regex' => '/volvo/i'],
            ['name' => 'Volkswagen', 'regex' => '/Volkswagen|vw/i'],
        ];

        DB::table('vehicle_makes')->insert($makes);
    }
}
