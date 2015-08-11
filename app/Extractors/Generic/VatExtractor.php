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
 * This is the vat extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class VatExtractor implements ExtractorInterface
{
    const REGEX_VAT = '/(\d+)(,\d+)?% IVA incluído/i';

    /**
     * The input string.
     *
     * @var string
     */
    protected $str;

    /**
     * Create a new vat extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::clean($params[0]);
    }

    /**
     * Extract the vat.
     *
     * @return int|null
     */
    public function extract()
    {
        if (preg_match(self::REGEX_VAT, $this->str, $match)) {
            return (integer) $match[1] != 0 ?: null;
        }
    }
}
