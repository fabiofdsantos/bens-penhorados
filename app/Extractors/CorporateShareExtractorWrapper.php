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
 * This is the corporate share extractor wrapper.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 *
 * @method mixed nif()
 */
class CorporateShareExtractorWrapper extends AbstractExtractorWrapper
{
    /**
     * The corporate share extractors.
     *
     * @var array
     */
    protected $extractors = [
        'nif' => '\App\Extractors\CorporateShare\NifExtractor',
    ];
}
