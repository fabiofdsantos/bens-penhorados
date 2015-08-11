<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Extractors\Generic;

use App\Extractors\AbstractExtractor;
use App\Helpers\Text;

/**
 * This is the price extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class PriceExtractor extends AbstractExtractor
{
    const REGEX_PRICE = '/€ (\d{0,}?\.?\d+\,\d+)/';

    /**
     * Create a new price extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::clean($params[0]);
    }

    /**
     * Extract the price.
     *
     * @return float|null
     */
    public function extract()
    {
        if (preg_match(self::REGEX_PRICE, $this->str, $match)) {
            $match[1] = str_replace('.', '', $match[1]);
            $match[1] = str_replace(',', '.', $match[1]);

            return (float) $match[1];
        }
    }
}
