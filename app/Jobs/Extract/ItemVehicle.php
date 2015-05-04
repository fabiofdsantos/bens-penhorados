<?php

namespace App\Jobs\Extract;

use App\Models\Items\Vehicle;
use App\Jobs\Job;

/**
 * Description here...
 */
class ItemVehicle extends Job
{
    protected $code;
    protected $desc;

    public function __construct($code, $description)
    {
        $this->code = $code;
        $this->desc = $description;
    }

    public function handle()
    {
        $vehicle = new Vehicle();
        $vehicle->code = $this->code;

        //    $vehicle->make;
        //    $vehicle->model;

        if (preg_match('/ano de.?([0-9]{4})/im', $this->desc, $match)) {
            $vehicle->year = $match[1];
        } elseif (preg_match('/de.?([0-9]{4})/im', $this->desc, $match)) {
            $vehicle->year = $match[1];
        } else {
            $vehicle->year = null;
        }

        $categories = ['ligeiro', 'motociclo', 'empilhador'];
        foreach ($categories as $category) {
            if (preg_match("/$category/im")) {
                $vehicle->category = $category;
                break;
            }
        }

        $types = ['passageiros', 'mercadorias'];
        foreach ($types as $type) {
            if (preg_match("/$type/im", $this->desc)) {
                $vehicle->type = $type;
                break;
            }
        }

        $colors = ['preto', 'branco', 'cinzento', 'prateado', 'azul', 'vermelho',
        'amarelo', 'verde', 'bege', 'rosa', 'roxo', 'dourado', 'castanho',
        'preta', 'branca', 'cinzenta', 'prateada', 'vermelha', 'amarela',
        'dourada', 'castanha', ];

        foreach ($colors as $color) {
            if (preg_match("/$color/im", $this->desc)) {
                $vehicle->color = $color;
                break;
            }
        }

        if (preg_match('/gasolina/im', $this->desc)) {
            $vehicle->fuel = 'Gasolina';
        } elseif (preg_match('/gasoleo/iu', $this->desc)) {
            $vehicle->fuel = 'Diesel';
        } elseif (preg_match('/diesel/im', $this->desc)) {
            $vehicle->fuel = 'Diesel';
        } else {
            $vehicle->fuel = null;
        }

        if (preg_match('/mau estado/im', $this->desc)) {
            $vehicle->isGoodCondition = false;
        } elseif (preg_match('/bom estado/im', $this->desc)) {
            $vehicle->isGoodCondition = true;
        } elseif (preg_match('/avariado/im', $this->desc)) {
            $vehicle->isGoodCondition = false;
        } elseif (preg_match('/regular estado/im', $this->desc)) {
            $vehicle->isGoodCondition = true;
        } elseif (preg_match('/razoavel estado/uim', $this->desc)) {
            $vehicle->isGoodCondition = true;
        } elseif (preg_match('/sucata/im', $this->desc)) {
            $vehicle->isGoodCondition = false;
        } else {
            $vehicle->isGoodCondition = null;
        }
    }
}
