<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Extractors\Wrappers\CorporateShareExtractorWrapper;

/**
 * This is the abstract corporate share extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
abstract class AbstractCorporateShareExtractorTest extends AbstractTestCase
{
    protected $extractor;

    public function __construct()
    {
        $this->extractor = new CorporateShareExtractorWrapper();
    }
}
