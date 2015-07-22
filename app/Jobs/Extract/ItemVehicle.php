<?php

namespace App\Jobs\Extract;

use App\Jobs\Job;
use App\Models\Items\Attributes\Color;
use App\Models\Items\Attributes\Fuel;
use App\Models\Items\Attributes\MakeAndModel;
use App\Models\Items\Vehicle;

class ItemVehicle extends Job
{
    /**
     * The vehicle code.
     *
     * @var string
     */
    protected $code;

    /**
     * The vehicle description.
     *
     * @var array
     */
    protected $description;

    /**
     * The current year.
     *
     * @var int
     */
    protected $currentYear;

    /**
     * Create a new job instance.
     *
     * @param string $code
     * @param array  $description
     */
    public function __construct($code, $description)
    {
        $this->code = $code;
        $this->description = $description;
        $this->currentYear = idate('Y');
    }

    /**
     * Execute the job.
     *
     * @return mixed
     */
    public function handle()
    {
        print "\n > Extracting vehicle attributes of $this->code ... \n";

        $vehicle = new Vehicle();
        $vehicle->code = $this->code;

        foreach ($this->description as $key => $value) {
            if (is_null($vehicle->year)) {
                if (preg_match('/(ano|de)\s*\pP?\s*(\d{4})/i', $value, $match)) {
                    $vehicle->year = ($this->isValidYear($match[2]) ? $match[2] : null);
                }
            }

            if (is_null($vehicle->engine_displacement)) {
                if (preg_match('/[^\-]cc|cm[³3]\b/iu', $value)) {
                    $vehicle->engine_displacement = $this->extractEngineDisplacement($value);
                }
            }

            if (is_null($vehicle->reg_plate_code)) {
                if (preg_match('/matr[iíì]cula/iu', $value)) {
                    $vehicle->reg_plate_code = $this->extractRegPlateCode($value);
                }
            }

            if (is_null($vehicle->make_id)) {
                if (preg_match('/\bmarca\b/i', $value)) {
                    $vehicle->make_id = $this->extractMake($value);
                }
            }

            if (is_null($vehicle->model_id)) {
                if (preg_match('/\bmodelo\b/i', $value) && isset($vehicle->make_id)) {
                    $vehicle->model_id = $this->extractModel($value, $vehicle->make_id);
                }
            }

            if (is_null($vehicle->color_id)) {
                if (preg_match('/\bc[oóòôõ]r\b/iu', $value)) {
                    $vehicle->color_id = $this->extractColor($value);
                }
            }

            if (is_null($vehicle->fuel_id)) {
                if (preg_match('/combust[iíì]vel/iu', $value)) {
                    $vehicle->fuel_id = $this->extractFuelType($value);
                }
            }
        }

        $vehicle->save();
    }

    /**
     * Extract the engine displacement.
     *
     * @param string $str
     *
     * @return int
     */
    private function extractEngineDisplacement($str)
    {
        if (preg_match('/(\d+)\s*(cc|cm[³3])/iu', $str, $match)) {
            return $match[1];
        }
    }

    /**
     * Extract the registration plate code.
     *
     * @param string $str
     *
     * @return string
     */
    private function extractRegPlateCode($str)
    {
        $regex_general = '/\d{2}-\d{2}-[a-z]{2}|\d{2}-[a-z]{2}-\d{2}|[a-z]{2}-\d{2}-\d{2}/i';
        if (preg_match($regex_general, $str, $match)) {
            return $match[0];
        }

        $regex_trailers = '/[a-z]{1,2}-\d{1,6}/i';
        if (preg_match($regex_trailers, $str, $match)) {
            return $match[0];
        }
    }

    /**
     * Extract the make.
     *
     * @param string $str
     *
     * @return int
     */
    private function extractMake($str)
    {
        foreach (MakeAndModel::makes() as $make) {
            if (preg_match("/$make->name/ui", $str)) {
                return $make->id;
            }
        }
    }

    /**
     * Extract the model.
     *
     * @param string $str
     * @param int    $makeId
     *
     * @return int
     */
    private function extractModel($str, $makeId)
    {
        foreach (MakeAndModel::models($makeId) as $model) {
            if (preg_match("/$model->name/ui", $str)) {
                return $model->id;
            }
        }
    }

    /**
     * Extract the color.
     *
     * @param string $str
     *
     * @return int
     */
    private function extractColor($str)
    {
        foreach (Color::all() as $color) {
            if (preg_match($color->regex, $str)) {
                return $color->id;
            }
        }
    }

    /**
     * Extract the fuel type.
     *
     * @param string $str
     */
    private function extractFuelType($str)
    {
        foreach (Fuel::all() as $fuel) {
            if (preg_match($fuel->regex, $str)) {
                return $fuel->id;
            }
        }
    }

    /**
     * Check if a given year is valid.
     *
     * @param int $year
     *
     * @return bool
     */
    private function isValidYear($year)
    {
        if ($year <= $this->currentYear && $year >= 1950) {
            return true;
        }

        return false;
    }
}
