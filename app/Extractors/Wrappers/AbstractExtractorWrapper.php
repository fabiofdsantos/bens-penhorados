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
 * This is the abstract extractor wrapper class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
abstract class AbstractExtractorWrapper
{
    protected $extractors;

    public function __construct()
    {
        $this->extractors = static::EXTRACTORS;
    }

    /**
     * Call the properly extractor.
     *
     * @param string $func
     * @param array  $params
     *
     * @return mixed
     */
    public function __call($func, $params)
    {
        if (array_key_exists($func, $this->extractors)) {
            return (new $this->extractors[$func]($params))->extract();
        }
    }
}
