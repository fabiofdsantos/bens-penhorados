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
 * @method mixed category()
 * @method mixed color()
 * @method mixed condition()
 * @method mixed engDispl()
 * @method mixed fuel()
 * @method mixed make()
 * @method mixed model()
 * @method mixed regPlateCode()
 * @method mixed type()
 */
class VehicleExtractorWrapper extends AbstractExtractorWrapper
{
    /**
     * The vehicle's extractors.
     *
     * @var array
     */
    protected $extractors = [
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
