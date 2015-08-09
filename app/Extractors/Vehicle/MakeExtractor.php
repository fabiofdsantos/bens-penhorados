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
use App\Models\Items\Attributes\VehicleMake;
use App\Helpers\Text;

/**
 * This is the make extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class MakeExtractor implements ExtractorInterface
{
    /**
     * The input string.
     *
     * @var string
     */
    protected $str;

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
     *
     * @return void
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
