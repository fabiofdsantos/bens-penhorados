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

use App\Extractors\ExtractorInterface;
use App\Helpers\Text;

/**
 * This is the price extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class PriceExtractor implements ExtractorInterface
{
    const REGEX_PRICE = '/(\d+?\.?\d+\,\d+)/';

    /**
     * The input string.
     *
     * @var string
     */
    protected $str;

    /**
     * Create a new price extractor instance.
     *
     * @param array $params
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->str = Text::clean($params[0]);
    }

    /**
     * Extract the price.
     *
     * @return int|null
     */
    public function extract()
    {
        if (preg_match(self::REGEX_PRICE, $this->str, $match)) {
            $match[0] = str_replace('.', '', $match[0]);
            $match[0] = str_replace(',', '.', $match[0]);

            return (integer) $match[0];
        }
    }
}
