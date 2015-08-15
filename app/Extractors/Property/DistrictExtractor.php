<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Extractors\Property;

use App\Extractors\AbstractExtractor;
use App\Helpers\Text;
use App\Models\Attributes\Generic\District;

/**
 * This is the district extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class DistrictExtractor extends AbstractExtractor
{
    /**
     * The list of districts.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $districts;

    /**
     * Create a new district extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::removeAccents($params[0]);
        $this->districts = District::all();
    }

    /**
     * Extract the district.
     *
     * @return int|null
     */
    public function extract()
    {
        foreach ($this->districts as $district) {
            if (preg_match($district->regex, $this->str)) {
                return $district->id;
            }
        }
    }
}
