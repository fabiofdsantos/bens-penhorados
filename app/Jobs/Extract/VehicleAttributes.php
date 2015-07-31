<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Jobs\Extract;

use App\Helpers\Text;
use App\Jobs\Job;
use App\Models\Items\Attributes\VehicleCategory;
use App\Models\Items\Attributes\VehicleColor;
use App\Models\Items\Attributes\VehicleFuel;
use App\Models\Items\Attributes\VehicleMake;
use App\Models\Items\Attributes\VehicleModel;
use App\Models\Items\Attributes\VehicleType;
use App\Models\Items\Item;
use App\Models\Items\Vehicle;

class VehicleAttributes extends Job
{
    /**
     * The attributes that should be extracted.
     *
     * @var array
     */
    protected $attributes = [
        'year'                => null,
        'engine_displacement' => null,
        'reg_plate_code'      => null,
        'is_good_condition'   => null,
        'make_id'             => null,
        'model_id'            => null,
        'color_id'            => null,
        'fuel_id'             => null,
        'category_id'         => null,
        'type_id'             => null,
    ];

    /**
     * The item's code.
     *
     * @var string
     */
    protected $code;

    /**
     * The vehicle's description.
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
        print "\n > Extracting vehicle attributes of {$this->code} ... \n";

        // Start the normal extraction of attributes
        $this->extractAttributes();

        // Check if there are still empty attributes
        if ($this->hasEmptyAttributes()) {
            $this->forceExtraction();
        }

        // Create a new vehicle
        $vehicle = Vehicle::create($this->attributes);

        // Set the polymorphic relationship
        Item::setPolymorphicRelation($this->code, $vehicle);

        // Update the item's title
        $vehicle->item->update([
            'title' => $this->generateTitle($vehicle),
        ]);
    }

    /**
     * Extract attributes from the vehicle's description.
     *
     * @return void
     */
    private function extractAttributes()
    {
        foreach ($this->description as $value) {
            $value = Text::removeAccents($value);

            if (is_null($this->attributes['year'])) {
                if (preg_match('/(ano|de)\s*\pP?\s*(\d{4})/i', $value, $match)) {
                    $this->attributes['year'] = ($this->isValidYear($match[2]) ? $match[2] : null);
                }
            }

            if (is_null($this->attributes['engine_displacement'])) {
                if (preg_match('/[^\-]cc|cm[³3]\b/iu', $value)) {
                    $this->attributes['engine_displacement'] = $this->extractEngineDisplacement($value);
                }
            }

            if (is_null($this->attributes['reg_plate_code'])) {
                if (preg_match('/matricula/i', $value)) {
                    $this->attributes['reg_plate_code'] = $this->extractRegPlateCode($value);
                }
            }

            if (is_null($this->attributes['is_good_condition'])) {
                if (preg_match('/\bestado\b/i', $value)) {
                    $this->attributes['is_good_condition'] = $this->extractCondition($value);
                }
            }

            if (is_null($this->attributes['make_id'])) {
                if (preg_match('/\bmarca\b/i', $value)) {
                    $this->attributes['make_id'] = $this->extractMake($value);
                }
            }

            if (is_null($this->attributes['model_id'])) {
                if (preg_match('/\bmodelo\b/i', $value) && isset($this->attributes['make_id'])) {
                    $this->attributes['model_id'] = $this->extractModel($value, $this->attributes['make_id']);
                }
            }

            if (is_null($this->attributes['color_id'])) {
                if (preg_match('/\bcor\b/i', $value)) {
                    $this->attributes['color_id'] = $this->extractColor($value);
                }
            }

            if (is_null($this->attributes['fuel_id'])) {
                if (preg_match('/combustivel/i', $value)) {
                    $this->attributes['fuel_id'] = $this->extractFuelType($value);
                }
            }

            if (is_null($this->attributes['category_id'])) {
                if (preg_match('/veiculo|categoria/i', $value)) {
                    $this->attributes['category_id'] = $this->extractVehicleCategory($value);
                }
            }

            if (is_null($this->attributes['type_id'])) {
                if (preg_match('/\btipo\b/i', $value)) {
                    $this->attributes['type_id'] = $this->extractVehicleType($value, false);
                }
            }
        }
    }

    /**
     * Force the extraction of some attributes.
     *
     * @return void
     */
    private function forceExtraction()
    {
        foreach ($this->description as $value) {
            $value = Text::removeAccents($value);

            if (is_null($this->attributes['make_id'])) {
                $this->attributes['make_id'] = $this->extractMake($value);
            }

            if (is_null($this->attributes['model_id']) && isset($this->attributes['make_id'])) {
                $this->attributes['model_id'] = $this->extractModel($value, $this->attributes['make_id']);
            }

            if (is_null($this->attributes['reg_plate_code'])) {
                $this->attributes['reg_plate_code'] = $this->extractRegPlateCode($value);
            }

            if (is_null($this->attributes['is_good_condition'])) {
                $this->attributes['is_good_condition'] = $this->extractCondition($value);
            }

            if (is_null($this->attributes['fuel_id'])) {
                $this->attributes['fuel_id'] = $this->extractFuelType($value);
            }

            if (is_null($this->attributes['category_id'])) {
                $this->attributes['category_id'] = $this->extractVehicleCategory($value);
            }

            if (is_null($this->attributes['type_id'])) {
                $this->attributes['type_id'] = $this->extractVehicleType($value, true);
            }
        }
    }

    /**
     * Extract the vehicle's engine displacement.
     *
     * @param string $str
     *
     * @return int|null
     */
    private function extractEngineDisplacement($str)
    {
        if (preg_match('/(\d+)\s*(cc|cm[³3])/iu', $str, $match)) {
            return $match[1];
        }
    }

    /**
     * Extract the vehicle's registration plate code.
     *
     * @param string $str
     *
     * @return string|null
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
     * Extract and check the vehicle's condition.
     *
     * @param string $str
     *
     * @return bool|null
     */
    private function extractCondition($str)
    {
        $regex_goodCondition = [
            '/\b(bom|razoavel|regular)\s(estado)\b/i',
            '/\bestado razoavel\b/i',
        ];

        foreach ($regex_goodCondition as $regex) {
            if (preg_match($regex, $str)) {
                return true;
            }
        }

        $regex_badCondition = [
            '/\bmau estado\b/i',
            '/\bsucata\b/i',
            '/\bavariado\b/i',
            '/\bmal tratado\b/i',
            '/\bpintura riscada\b/i',
            '/\b(amolgad)(o|elas?)\b/i',
        ];

        foreach ($regex_badCondition as $regex) {
            if (preg_match($regex, $str)) {
                return false;
            }
        }
    }

    /**
     * Extract the vehicle's make.
     *
     * @param string $str
     *
     * @return int|null
     */
    private function extractMake($str)
    {
        $makes = VehicleMake::all();

        foreach ($makes as $make) {
            if (preg_match($make->regex, $str)) {
                return $make->id;
            }
        }
    }

    /**
     * Extract the vehicle's model.
     *
     * @param string $str
     * @param int    $makeId
     *
     * @return int|null
     */
    private function extractModel($str, $makeId)
    {
        $models = VehicleModel::ofMake($makeId)->get();

        foreach ($models as $model) {
            if (preg_match("/$model->name/ui", $str)) {
                return $model->id;
            }
        }
    }

    /**
     * Extract the vehicle's color.
     *
     * @param string $str
     *
     * @return int|null
     */
    private function extractColor($str)
    {
        $colors = VehicleColor::all();

        foreach ($colors as $color) {
            if (preg_match($color->regex, $str)) {
                return $color->id;
            }
        }
    }

    /**
     * Extract the vehicle's fuel type.
     *
     * @param string $str
     *
     * @return int|null
     */
    private function extractFuelType($str)
    {
        $fuels = VehicleFuel::all();

        foreach ($fuels as $fuel) {
            if (preg_match($fuel->regex, $str)) {
                return $fuel->id;
            }
        }
    }

    /**
     * Extract the vehicle's category.
     *
     * @param string $str
     *
     * @return int|null
     */
    private function extractVehicleCategory($str)
    {
        $categories = VehicleCategory::all();

        foreach ($categories as $category) {
            if (preg_match($category->regex, $str)) {
                return $category->id;
            }
        }
    }

    /**
     * Extract the vehicle's type.
     *
     * @param string $str
     * @param bool   $isForceExtraction
     *
     * @return int|null
     */
    private function extractVehicleType($str, $isForceExtraction)
    {
        $numTypes = 0;
        $types = VehicleType::all();

        foreach ($types as $type) {
            if (preg_match($type->regex, $str)) {
                if ($isForceExtraction) {
                    $tempType = $type->id;
                    $numTypes++;
                } else {
                    return $type->id;
                }
            }
        }

        if ($numTypes == 1) {
            return $tempType;
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

    /**
     * Check if there are empty attributes.
     *
     * @return bool
     */
    private function hasEmptyAttributes()
    {
        foreach ($this->attributes as $attr) {
            if (is_null($attr)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Generate the vehicle's title.
     *
     * @param Vehicle $vehicle
     *
     * @return string
     */
    private function generateTitle(Vehicle $vehicle)
    {
        if (isset($this->attributes['make_id'])) {
            $title = $vehicle->make()->pluck('name');

            if (isset($this->attributes['model_id'])) {
                $title .= " {$vehicle->model()->pluck('name')}";
            }
        } else {
            $title = $this->code;
        }

        if (isset($this->attributes['year'])) {
            $title .= " ({$this->attributes['year']})";
        }

        return $title;
    }
}
