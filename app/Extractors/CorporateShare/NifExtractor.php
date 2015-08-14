<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Extractors\CorporateShare;

use App\Extractors\AbstractExtractor;

/**
 * This is the nif extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class NifExtractor extends AbstractExtractor
{
    const REGEX_NIF = '/\b([125689][0-9]{2})\s?\pP?([0-9]{3})\s?\pP?([0-9]{3})\b/';

    /**
     * Create a new nif extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = $params[0];
    }

    /**
     * Extract the NIF.
     *
     * @return int|null
     */
    public function extract()
    {
        if (preg_match(self::REGEX_NIF, $this->str, $match)) {
            return ($match[0] ? (integer) ($match[1].$match[2].$match[3]) : null);
        }
    }
}
