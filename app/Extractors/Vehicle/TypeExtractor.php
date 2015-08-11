<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Extractors\Vehicle;

use App\Extractors\AbstractExtractor;
use App\Helpers\Text;
use App\Models\Attributes\Vehicle\VehicleType;

/**
 * This is the type extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class TypeExtractor extends AbstractExtractor
{
    /**
     * The input string.
     *
     * @var str
     */
    protected $str;

    /**
     * The vehicle's types.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $types;

    /**
     * If true, the for extraction mode is on.
     *
     * @var bool
     */
    protected $isForceExtraction;

    /**
     * Create a new type extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::removeAccents($params[0]);
        $this->isForceExtraction = $params[1];
        $this->types = VehicleType::all();
    }

    /**
     * Extract the type.
     *
     * @return int|null
     */
    public function extract()
    {
        $numTypes = 0;
        $tempType = null;

        foreach ($this->types as $type) {
            if (preg_match($type->regex, $this->str)) {
                if ($this->isForceExtraction) {
                    $tempType = $type->id;
                    $numTypes++;
                } else {
                    return $type->id;
                }
            }
        }

        if ($numTypes === 1) {
            return $tempType;
        }
    }
}
