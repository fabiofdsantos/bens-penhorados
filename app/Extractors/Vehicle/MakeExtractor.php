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
use App\Models\Attributes\Vehicle\VehicleMake;

/**
 * This is the make extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class MakeExtractor extends AbstractExtractor
{
    /**
     * The vehicle's makes.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $makes;

    /**
     * Create a new make extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::removeAccents($params[0]);
        $this->makes = VehicleMake::all();
    }

    /**
     * Extract the make.
     *
     * @return int|null
     */
    public function extract()
    {
        foreach ($this->makes as $make) {
            if (preg_match($make->regex, $this->str)) {
                return $make->id;
            }
        }
    }
}
