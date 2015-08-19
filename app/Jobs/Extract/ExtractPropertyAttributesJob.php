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

use App\Extractors\Wrappers\PropertyExtractorWrapper;
use App\Jobs\Job;
use App\Models\Attributes\Generic\Municipality;
use App\Models\Items\Item;
use App\Models\Items\Property;

/**
 * This is the extract property attributes job.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class ExtractPropertyAttributesJob extends Job
{
    const REGEX_FLAG_DISTRICT = '/\bdistrito\b/i';
    const REGEX_FLAG_MUNICIPALITY = '/\bregisto[\s\pP]*predial|concelho\b/i';
    const REGEX_FLAG_LANDREGISTRY = '/\bpr\wdio|matriz\b/iu';

    /**
     * The property extractor.
     *
     * @var PropertyExtractorWrapper
     */
    protected $extractor;

    /**
     * The attributes that should be extracted.
     *
     * @var array
     */
    protected $attributes = [
        'district_id'      => null,
        'municipality_id'  => null,
        'land_registry_id' => null,
    ];

    /**
     * The attributes that should be used on force extraction mode.
     *
     * @var string[]
     */
    protected $attrToForce = [];

    /**
     * The property's code.
     *
     * @var string
     */
    protected $code;

    /**
     * The property's description.
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
        $this->extractor = new PropertyExtractorWrapper();
    }

    /**
     * Execute the job.
     *
     * @return mixed
     */
    public function handle()
    {
        print "\n > Extracting property attributes of {$this->code} ... \n";

        // Start the normal extraction of attributes
        $this->extractAttributes();

        // Create a new property
        $property = Property::create([
            'land_registry_id' => $this->attributes['land_registry_id'],
        ]);

        // Set the polymorphic relationship
        Item::setPolymorphicRelation($this->code, $property);

        // Update the item's title
        $property->item->update([
            'title' => $this->generateTitle($property),
        ]);

        // Update the item's location
        if (isset($this->attributes['municipality_id'])) {
            if (is_null($this->attributes['district_id'])) {
                $this->attributes['district_id'] = Municipality::find($this->attributes['municipality_id'])->pluck('district_id');
            }

            $property->item->update([
                'district_id'     => $this->attributes['district_id'],
                'municipality_id' => $this->attributes['municipality_id'],
            ]);

            $property->update([
                'location_on_desc' => true,
            ]);
        }
    }

    /**
     * Extract attributes from the property's description.
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
                        if ($attrKey == 'municipality_id') {
                            $this->attributes[$attrKey] = $this->extractor->municipality($str, $this->attributes['district_id']);
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
            'district_id'      => 'district',
            'municipality_id'  => 'municipality',
            'land_registry_id' => 'landRegistry',
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
            'district_id'      => self::REGEX_FLAG_DISTRICT,
            'municipality_id'  => self::REGEX_FLAG_MUNICIPALITY,
            'land_registry_id' => self::REGEX_FLAG_LANDREGISTRY,
        ];

        return $mapAttrFlagPattern[$attribute];
    }

    /**
     * Generate the property's title.
     *
     * @param Property $property
     *
     * @return string
     */
    private function generateTitle(Property $property)
    {
        if (isset($this->attributes['land_registry_id'])) {
            return $property->landRegistry()->pluck('name');
        }

        return $this->code;
    }
}
