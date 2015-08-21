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

use App\Extractors\Wrappers\VehicleExtractorWrapper;
use App\Jobs\Job;
use App\Models\Items\Item;
use App\Models\Items\Vehicle;
use App\Models\RawData;

/**
 * This is the extract vehicle attributes job.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class ExtractVehicleAttributesJob extends Job
{
    const REGEX_FLAG_YEAR = '/\bano\b|\bde\b/i';
    const REGEX_FLAG_ENGDISPL = '/cilindrada/iu';
    const REGEX_FLAG_REGPLATECODE = '/matr\wcula/iu';
    const REGEX_FLAG_CONDITION = '/\bestado\b/i';
    const REGEX_FLAG_MAKE = '/\bmarca\b/i';
    const REGEX_FLAG_MODEL = '/\bmodelo\b/i';
    const REGEX_FLAG_COLOR = '/\bc\wr\b/iu';
    const REGEX_FLAG_FUEL = '/combust\wvel/iu';
    const REGEX_FLAG_CATEGORY = '/ve\wculo|categor\wa/iu';
    const REGEX_FLAG_TYPE = '/\btipo\b/i';

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
     * The attributes that should be used on force extraction mode.
     *
     * @var string[]
     */
    protected $attrToForce = [
        'make_id', 'model_id', 'reg_plate_code', 'is_good_condition',
        'engine_displacement', 'color_id', 'fuel_id', 'category_id', 'type_id',
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

        // Force extraction, if there are empty attributes
        if ($this->hasEmptyAttributes()) {
            $this->extractAttributes(true);
        }

        // Update or create a new vehicle
        $vehicle = $this->updateOrCreateVehicle();

        // Set the polymorphic relationship
        Item::setPolymorphicRelation($this->code, $vehicle);

        // Update the item's title
        $vehicle->item->update([
            'title' => $this->generateTitle($vehicle),
        ]);

        // Update raw data
        RawData::find($this->code)->update(['extracted' => true]);
    }

    /**
     * Extract attributes from the vehicle's description.
     *
     * @return void
     */
    private function extractAttributes($flag_forceMode = false)
    {
        foreach ($this->description as $str) {
            foreach ($this->attributes as $attrKey => $attrVal) {

                // Check if the attribute value is null
                if (is_null($attrVal)) {
                    if ($flag_forceMode || preg_match($this->getRegexFlagPattern($attrKey), $str)) {

                        // Note: some extractors requires more than one input param
                        if ($attrKey == 'model_id') {
                            if (isset($this->attributes['make_id'])) {
                                $this->attributes[$attrKey] = $this->extractor->model($str, $this->attributes['make_id']);
                            }
                        } elseif ($attrKey == 'type_id') {
                            $this->attributes[$attrKey] = $this->extractor->type($str, $flag_forceMode);
                        } else {
                            $this->attributes[$attrKey] = $this->extractor->{$this->getExtractorFuncName($attrKey)}($str);
                        }
                    }
                }
            }
        }
    }

    /**
     * Get the name of the extractor function for a given attribute.
     *
     * @param string $attribute
     *
     * @return string
     */
    private function getExtractorFuncName($attribute)
    {
        $mapAttrFunc = [
            'year'                => 'year',
            'engine_displacement' => 'engDispl',
            'reg_plate_code'      => 'regPlateCode',
            'is_good_condition'   => 'condition',
            'make_id'             => 'make',
            'model_id'            => 'model',
            'color_id'            => 'color',
            'fuel_id'             => 'fuel',
            'category_id'         => 'category',
            'type_id'             => 'type',
        ];

        return $mapAttrFunc[$attribute];
    }

    /**
     * Get the regex flag pattern for a given attribute.
     *
     * @param string $attribute
     *
     * @return string
     */
    private function getRegexFlagPattern($attribute)
    {
        $mapAttrFlagPattern = [
            'year'                => self::REGEX_FLAG_YEAR,
            'engine_displacement' => self::REGEX_FLAG_ENGDISPL,
            'reg_plate_code'      => self::REGEX_FLAG_REGPLATECODE,
            'is_good_condition'   => self::REGEX_FLAG_CONDITION,
            'make_id'             => self::REGEX_FLAG_MAKE,
            'model_id'            => self::REGEX_FLAG_MODEL,
            'color_id'            => self::REGEX_FLAG_COLOR,
            'fuel_id'             => self::REGEX_FLAG_FUEL,
            'category_id'         => self::REGEX_FLAG_CATEGORY,
            'type_id'             => self::REGEX_FLAG_TYPE,
        ];

        return $mapAttrFlagPattern[$attribute];
    }

    /**
     * Update or create a new vehicle.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function updateOrCreateVehicle()
    {
        $item = Item::find($this->code);
        $vehicle = ($item ? Vehicle::find($item->itemable_id) : null);

        if (isset($vehicle)) {
            $vehicle->update($this->attributes);
        } else {
            $vehicle = Vehicle::create($this->attributes);
        }

        return $vehicle;
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

            if (isset($this->attributes['category_id'])) {
                $title .= " - {$vehicle->category()->pluck('name')}";
            }
        }

        if (isset($this->attributes['year'])) {
            $title .= " ({$this->attributes['year']})";
        }

        return $title;
    }
}
