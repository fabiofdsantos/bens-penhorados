<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Extractors\Wrappers;

/**
 * This is the property extractor wrapper.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 *
 * @method int|null district(string $str)
 * @method int|null municipality(string $str, int $int)
 */
class PropertyExtractorWrapper extends AbstractExtractorWrapper
{
    const EXTRACTORS = [
        'district'     => '\App\Extractors\Property\DistrictExtractor',
        'municipality' => '\App\Extractors\Property\MunicipalityExtractor',
    ];
}
