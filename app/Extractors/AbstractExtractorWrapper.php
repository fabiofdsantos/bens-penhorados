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
 * This is the abstract extractor wrapper class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class AbstractExtractorWrapper
{
    public function __call($func, $params)
    {
        if (array_key_exists($func, $this->extractors)) {
            return (new $this->extractors[$func]($params))->extract();
        }
    }
}
