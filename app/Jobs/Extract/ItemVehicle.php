<?php

namespace App\Jobs\Extract;

use App\Jobs\Job;
use App\Models\Items\Vehicle;

/**
 * Description here...
 */
class ItemVehicle extends Job
{
    protected $foundAttr;
    protected $code;
    protected $desc;
    protected $makesModels;
    protected $colors;
    protected $currentYear;

    public function __construct($code, $description)
    {
        $this->code = $code;
        $this->desc = $description;
        $this->currentYear = idate('Y');
        $this->initFoundAttributes();
    }

    public function handle()
    {
        print "\n > Extracting vehicle attributes of $this->code ... \n";

        $vehicle = new Vehicle();
        $vehicle->code = $this->code;

        foreach ($this->desc as $descKey => $descValue) {
            if (preg_match('/^c[oóòôõ]r$/ui', $descValue)) {
                $vehicle->color_id = $this->extractColor($descKey, 3);
            } elseif (preg_match('/^ano$/ui', $descValue)) {
                $vehicle->year = $this->extractYear($descKey, 2);
            }
        }

        $vehicle->save();
    }

    public function initFoundAttributes()
    {
        $this->foundAttr = [
            'color' => false,
            'year'  => false,
        ];
    }

    public function extractColor($key, $limit)
    {
        $i = 1;
        while ($this->foundAttr['color'] == false && $i <= $limit) {
            $value = $this->desc[$key + $i];

            foreach (Vehicle::allColors() as $color) {
                if (preg_match("/^$value$/ui", $color->name)) {
                    $this->foundAttr['color'] = true;

                    return is_null($color->parent_id) ? $color->id : $color->parent_id;
                }
            }
            $i++;
        }

        return;
    }

    public function extractYear($key, $limit)
    {
        $i = 1;
        while ($this->foundAttr['year'] == false && $i <= $limit) {
            $value = $this->desc[$key + $i];

            if (preg_match('/^([0-9]{4})$/', $value, $match)) {
                if ($this->isValidDate($match[0])) {
                    $this->foundAttr['year'] = true;

                    return $value;
                }
            }
            $i++;
        }

        return;
    }

    public function isValidDate($y)
    {
        if ($y <= $this->currentYear && $y >= 1950) {
            return true;
        }

        return;
    }
}
