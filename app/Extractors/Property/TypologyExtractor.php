<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Extractors\Property;

use App\Extractors\AbstractExtractor;
use App\Helpers\Text;

/**
 * This is the typology extractor extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class TypologyExtractor extends AbstractExtractor
{
    const REGEX_TYPOLOGY = '/t[\s\pP]*(\d+)/i';

    /**
     * Create a new typology extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::removeAccents($params[0]);
    }

    /**
     * Extract the typology.
     *
     * @return int|null
     */
    public function extract()
    {
        if (preg_match(self::REGEX_TYPOLOGY, $this->str, $match)) {
            return $match[1] ? (integer) $match[1] : null;
        }
    }
}
