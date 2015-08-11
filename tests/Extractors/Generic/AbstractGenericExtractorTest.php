<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Extractors\GenericExtractorWrapper;

/**
 * This is the abstract generic extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
abstract class AbstractGenericExtractorTest extends AbstractTestCase
{
    protected $extractor;

    public function __construct()
    {
        $this->extractor = new GenericExtractorWrapper();
    }
}
