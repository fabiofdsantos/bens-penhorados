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
use App\Models\Attributes\Vehicle\VehicleFuel;

/**
 * This is the fuel extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class FuelExtractor extends AbstractExtractor
{
    /**
     * The vehicle's fuels.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $fuels;

    /**
     * Create a new fuel extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::removeAccents($params[0]);
        $this->fuels = VehicleFuel::all();
    }

    /**
     * Extract the fuel.
     *
     * @return int|null
     */
    public function extract()
    {
        foreach ($this->fuels as $fuel) {
            if (preg_match($fuel->regex, $this->str)) {
                return $fuel->id;
            }
        }
    }
}
