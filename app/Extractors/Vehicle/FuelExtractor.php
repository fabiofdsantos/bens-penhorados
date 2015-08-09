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

use App\Extractors\ExtractorInterface;
use App\Models\Items\Attributes\VehicleFuel;
use App\Helpers\Text;

/**
 * This is the fuel extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class FuelExtractor implements ExtractorInterface
{
    /**
     * The input string.
     *
     * @var string
     */
    protected $str;

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
     *
     * @return void
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
