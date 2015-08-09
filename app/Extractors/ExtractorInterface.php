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
 * This is the extractor interface.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
interface ExtractorInterface
{
    /**
     * Extract an attribute.
     *
     * @return mixed
     */
    public function extract();
}
