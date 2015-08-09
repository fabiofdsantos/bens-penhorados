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

use App\Extractors\VehicleExtractorWrapper;
use App\Jobs\Job;
use App\Models\Items\Item;
use App\Models\Items\Vehicle;

/**
 * This is the extract vehicle attributes job.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class ExtractVehicleAttributesJob extends Job
{
    /**
     * The vehicle extractor.
     *
     * @var VehicleExtractorWrapper
     */
    protected $extractor;

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
     * The vehicle's code.
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
     * Create a new job instance.
     *
     * @param string $code
     * @param array  $description
     */
    public function __construct($code, $description)
    {
        $this->code = $code;
        $this->description = $description;
        $this->extractor = new VehicleExtractorWrapper();
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
            if (is_null($this->attributes['year'])) {
                if (preg_match('/(ano|de)\s*\pP?\s*(\d{4})/i', $value, $match)) {
                    $this->attributes['year'] = ($this->isValidYear($match[2]) ? $match[2] : null);
                }
            }

            if (is_null($this->attributes['engine_displacement'])) {
                if (preg_match('/[^\-]cc|cm[³3]\b/iu', $value)) {
                    $this->attributes['engine_displacement'] = $this->extractor->engDispl($value);
                }
            }

            if (is_null($this->attributes['reg_plate_code'])) {
                if (preg_match('/matricula/i', $value)) {
                    $this->attributes['reg_plate_code'] = $this->extractor->regPlateCode($value);
                }
            }

            if (is_null($this->attributes['is_good_condition'])) {
                if (preg_match('/\bestado\b/i', $value)) {
                    $this->attributes['is_good_condition'] = $this->extractor->condition($value);
                }
            }

            if (is_null($this->attributes['make_id'])) {
                if (preg_match('/\bmarca\b/i', $value)) {
                    $this->attributes['make_id'] = $this->extractor->make($value);
                }
            }

            if (is_null($this->attributes['model_id'])) {
                if (preg_match('/\bmodelo\b/i', $value) && isset($this->attributes['make_id'])) {
                    $this->attributes['model_id'] = $this->extractor->model($value, $this->attributes['make_id']);
                }
            }

            if (is_null($this->attributes['color_id'])) {
                if (preg_match('/\bcor\b/i', $value)) {
                    $this->attributes['color_id'] = $this->extractor->color($value);
                }
            }

            if (is_null($this->attributes['fuel_id'])) {
                if (preg_match('/combustivel/i', $value)) {
                    $this->attributes['fuel_id'] = $this->extractor->fuel($value);
                }
            }

            if (is_null($this->attributes['category_id'])) {
                if (preg_match('/veiculo|categoria/i', $value)) {
                    $this->attributes['category_id'] = $this->extractor->category($value);
                }
            }

            if (is_null($this->attributes['type_id'])) {
                if (preg_match('/\btipo\b/i', $value)) {
                    $this->attributes['type_id'] = $this->extractor->type($value, false);
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
            if (is_null($this->attributes['make_id'])) {
                $this->attributes['make_id'] = $this->extractor->make($value);
            }

            if (is_null($this->attributes['model_id']) && isset($this->attributes['make_id'])) {
                $this->attributes['model_id'] = $this->extractor->model($value, $this->attributes['make_id']);
            }

            if (is_null($this->attributes['reg_plate_code'])) {
                $this->attributes['reg_plate_code'] = $this->extractor->regPlateCode($value);
            }

            if (is_null($this->attributes['is_good_condition'])) {
                $this->attributes['is_good_condition'] = $this->extractor->condition($value);
            }

            if (is_null($this->attributes['fuel_id'])) {
                $this->attributes['fuel_id'] = $this->extractor->fuel($value);
            }

            if (is_null($this->attributes['category_id'])) {
                $this->attributes['category_id'] = $this->extractor->category($value);
            }

            if (is_null($this->attributes['type_id'])) {
                $this->attributes['type_id'] = $this->extractor->type($value, true);
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
        if ($year <= idate('Y') && $year >= 1950) {
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
