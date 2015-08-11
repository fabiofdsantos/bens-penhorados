<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Extractors\Vehicle;

use App\Extractors\AbstractExtractor;
use App\Helpers\Text;

/**
 * This is the registration plate code extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class RegPlateCodeExtractor extends AbstractExtractor
{
    const REGEX_GENERAL = '/\b(\d{2}-\d{2}-[a-z]{2}|\b\d{2}-[a-z]{2}-\d{2}|[a-z]{2}-\d{2}-\d{2})(?!\d|\[a-z])*\b/iu';
    const REGEX_TRAILERS = '/\b[a-z]{1,2}-\d{1,6}(?!-)\b/i';

    /**
     * The input string.
     *
     * @var string
     */
    protected $str;

    /**
     * Create a new registration plate code extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::removeAccents($params[0]);
    }

    /**
     * Extract the registration plate code.
     *
     * @return string|null
     */
    public function extract()
    {
        if (preg_match(self::REGEX_GENERAL, $this->str, $match)) {
            return $match[0];
        }

        if (preg_match(self::REGEX_TRAILERS, $this->str, $match)) {
            return $match[0];
        }
    }
}
