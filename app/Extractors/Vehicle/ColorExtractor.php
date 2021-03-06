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
use App\Models\Attributes\Vehicle\VehicleColor;

/**
 * This is the color extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class ColorExtractor extends AbstractExtractor
{
    /**
     * The vehicle's colors.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $colors;

    /**
     * Create a new color extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::removeAccents($params[0]);
        $this->colors = VehicleColor::all();
    }

    /**
     * Extract the color.
     *
     * @return int|null
     */
    public function extract()
    {
        foreach ($this->colors as $color) {
            if (preg_match($color->regex, $this->str)) {
                return $color->id;
            }
        }
    }
}
