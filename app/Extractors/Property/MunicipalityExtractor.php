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
use App\Models\Attributes\Generic\Municipality;

/**
 * This is the municipality extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class MunicipalityExtractor extends AbstractExtractor
{
    /**
     * The list of municipalities.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $municipalities;

    /**
     * Create a new district extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::removeAccents($params[0]);
        $this->municipalities = self::getMunicipalities($params[1]);
    }

    /**
     * Extract the municipality.
     *
     * @return int|null
     */
    public function extract()
    {
        foreach ($this->municipalities as $municipality) {
            if (preg_match($municipality->regex, $this->str)) {
                return $municipality->id;
            }
        }
    }

    /**
     * Get municipalities.
     *
     * @param int|null $districtId
     *
     * @return \Illuminate\Support\Collection
     */
    private static function getMunicipalities($districtId)
    {
        return isset($districtId) ? Municipality::ofDistrict($districtId)->get() : Municipality::all();
    }
}
