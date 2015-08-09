<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Extractors;

/**
 * This is the vehicle extractor wrapper.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 *
 * @method int|null    category(string $str)
 * @method int|null    color(string $str)
 * @method bool|null   condition(string $str)
 * @method int|null    engDispl(string $str)
 * @method int|null    fuel(string $str)
 * @method int|null    make(string $str)
 * @method int|null    model(string $str, int $int)
 * @method string|null regPlateCode(string $str)
 * @method int|null    type(string $str, bool $bool)
 */
class VehicleExtractorWrapper extends AbstractExtractorWrapper
{
    const EXTRACTORS = [
        'category'     => '\App\Extractors\Vehicle\CategoryExtractor',
        'color'        => '\App\Extractors\Vehicle\ColorExtractor',
        'condition'    => '\App\Extractors\Vehicle\ConditionExtractor',
        'engDispl'     => '\App\Extractors\Vehicle\EngineDisplacementExtractor',
        'fuel'         => '\App\Extractors\Vehicle\FuelExtractor',
        'make'         => '\App\Extractors\Vehicle\MakeExtractor',
        'model'        => '\App\Extractors\Vehicle\ModelExtractor',
        'regPlateCode' => '\App\Extractors\Vehicle\RegPlateCodeExtractor',
        'type'         => '\App\Extractors\Vehicle\TypeExtractor',
    ];
}
