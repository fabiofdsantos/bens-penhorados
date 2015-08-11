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
 * This is the abstract extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
abstract class AbstractExtractor
{
    /**
     * The input string.
     *
     * @var string
     */
    protected $str;

    /**
     * Extract an attribute.
     *
     * @return mixed
     */
    abstract public function extract();
}
