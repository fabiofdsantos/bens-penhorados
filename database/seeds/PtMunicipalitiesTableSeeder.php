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
        $this->call('Municipalities\AngraDoHeroismo');
        $this->call('Municipalities\Aveiro');
        $this->call('Municipalities\Beja');
        $this->call('Municipalities\Braga');
        $this->call('Municipalities\Braganca');
        $this->call('Municipalities\CasteloBranco');
        $this->call('Municipalities\Coimbra');
        $this->call('Municipalities\Evora');
        $this->call('Municipalities\Faro');
        $this->call('Municipalities\Funchal');
        $this->call('Municipalities\Guarda');
        $this->call('Municipalities\Horta');
        $this->call('Municipalities\Leiria');
        $this->call('Municipalities\Lisboa');
        $this->call('Municipalities\PontaDelgada');
        $this->call('Municipalities\Portalegre');
        $this->call('Municipalities\Porto');
        $this->call('Municipalities\Santarem');
        $this->call('Municipalities\Setubal');
        $this->call('Municipalities\VianaDoCastelo');
        $this->call('Municipalities\VilaReal');
        $this->call('Municipalities\Viseu');
    }
}
