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
            if (preg_match('/c[oóòôõ]r/ui', $descValue)) {
                $vehicle->color_id = $this->extractColor($descKey);
            }
        }

        $vehicle->save();
    }

    public function initFoundAttributes()
    {
        $this->foundAttr = [
            'color' => false,
        ];
    }

    public function extractColor($key)
    {
        $i = 1;
        while ($this->foundAttr['color'] == false && $i < 3) {
            $value = $this->desc[$key + $i];

            foreach (Vehicle::getAllColors() as $color) {
                if (preg_match("/$value/ui", $color->name)) {
                    $this->foundAttr['color'] = true;

                    return is_null($color->parent_id) ? $color->id : $color->parent_id;
                }
            }
            $i++;
        }

        return;
    }
}
