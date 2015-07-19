<?php

namespace App\Jobs\Extract;

use App\Jobs\Job;
use App\Models\Items\Attributes\Color;
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
    protected $desc;

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
        $this->desc = $description;
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

        foreach ($this->desc as $descKey => $descValue) {
            if (preg_match('/^c[oóòôõ]r$/ui', $descValue)) {
                $vehicle->color_id = $this->extractColor($descKey, 3);
            } elseif (preg_match('/^ano$/ui', $descValue)) {
                $vehicle->year = $this->extractYear($descKey, 2);
            } elseif (preg_match('/^c[iíì]l[iìí]ndrada$/ui', $descValue)) {
                $vehicle->engine_displacement = $this->extractEngineDisplacement($descKey, 3);
            } elseif (preg_match('/^matr[iíì]cula$/ui', $descValue)) {
                $vehicle->reg_plate_code = $this->extractRegPlateCode($descKey, 1);
            } elseif (preg_match('/^marca$/ui', $descValue)) {
                $vehicle->make_id = $this->extractMake($descKey, 1);
            } elseif (preg_match('/^modelo$/ui', $descValue)) {
                if (isset($vehicle->make_id)) {
                    $vehicle->model_id = $this->extractModel($descKey, 3, $vehicle->make_id);
                }
            }
        }

        $vehicle->save();
    }

    /**
     * Extract the color.
     *
     * @param int $key
     * @param int $limit
     *
     * @return mixed
     */
    private function extractColor($key, $limit)
    {
        for ($i = 1; $i <= $limit; $i++) {
            $value = $this->desc[$key + $i];

            foreach (Color::all() as $color) {
                if (preg_match("/^$value$/ui", $color->name)) {
                    $this->unsetValues($key, $i);

                    return is_null($color->parent_id) ? $color->id : $color->parent_id;
                }
            }
        }
    }

    /**
     * Extract the year.
     *
     * @param int $key
     * @param int $limit
     *
     * @return int
     */
    private function extractYear($key, $limit)
    {
        for ($i = 1; $i <= $limit; $i++) {
            $value = $this->desc[$key + $i];

            if (preg_match('/^([0-9]{4})$/', $value, $match)) {
                if ($this->isValidDate($match[0])) {
                    $this->unsetValues($key, $i);

                    return $value;
                }
            }
        }
    }

    /**
     * Extract the engine displacement.
     *
     * @param int $key
     * @param int $limit
     *
     * @return int
     */
    private function extractEngineDisplacement($key, $limit)
    {
        $prev_value = 0;
        for ($i = 1; $i <= $limit; $i++) {
            $value = $this->desc[$key + $i];

            if (preg_match('/^(\d+)cc$/ui', $value, $match)) {
                $match[1] += $prev_value;
                $this->unsetValues($key, $i);

                return $match[1];
            }

            if (preg_match('/^\d+$/', $value)) {
                $prev_value += $value;
            }

            if (preg_match('/^cc|cm3$/ui', $value)) {
                if (isset($prev_value)) {
                    $this->unsetValues($key, $i);

                    return $prev_value;
                }
            }
        }
    }

    /**
     * Extract the registration plate code.
     *
     * @param int $key
     * @param int $limit
     *
     * @return mixed
     */
    private function extractRegPlateCode($key, $limit)
    {
        $general_pattern = '\d{2}-\d{2}-[a-z]{2}|\d{2}-[a-z]{2}-\d{2}|[a-z]{2}-\d{2}-\d{2}';
        $trailers_pattern = '[a-z]{1,2}-\d{1,6}';

        for ($i = 1; $i <= $limit; $i++) {
            $value = $this->desc[$key + $i];

            if (preg_match("/^$general_pattern$/ui", $value)) {
                $this->unsetValues($key, $i);

                return $value;
            }

            if (preg_match("/^$trailers_pattern$/ui", $value)) {
                $this->unsetValues($key, $i);

                return $value;
            }
        }
    }

    /**
     * Extract the make.
     *
     * @param int $key
     * @param int $limit
     *
     * @return int
     */
    private function extractMake($key, $limit)
    {
        for ($i = 1; $i <= $limit; $i++) {
            $value = $this->desc[$key + $i];

            foreach (MakeAndModel::makes() as $make) {
                if (preg_match("/$make->name/ui", $value)) {
                    $this->unsetValues($key, $i);

                    return $make->id;
                }
            }
        }
    }

    /**
     * Extract the model.
     *
     * @param int $key
     * @param int $limit
     * @param int $make_id
     *
     * @return int
     */
    private function extractModel($key, $limit, $make_id)
    {
        for ($i = 1; $i <= $limit; $i++) {
            $value = $this->desc[$key + $i];

            foreach (MakeAndModel::models($make_id) as $model) {
                if (preg_match("/$model->name/ui", $value)) {
                    $this->unsetValues($key, $i);

                    return $model->id;
                }
            }
        }
    }

    /**
     * Check if a given year is valid.
     *
     * @param int $y
     *
     * @return bool
     */
    private function isValidDate($y)
    {
        if ($y <= $this->currentYear && $y >= 1950) {
            return true;
        }

        return false;
    }

    /**
     * Unset the attributes found in vehicle description.
     *
     * @param int $key
     * @param int $i
     */
    private function unsetValues($key, $i)
    {
        while ($i >= 0) {
            unset($this->desc[$key + $i]);
            $i--;
        }
    }
}
