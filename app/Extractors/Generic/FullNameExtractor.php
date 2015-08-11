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
 * This is the full name extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class FullNameExtractor extends AbstractExtractor
{
    const REGEX_FULLNAME = '/^[^(]+(?=$|\s)/ui';

    /**
     * Create a new full name extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::clean($params[0]);
    }

    /**
     * Extract the full name.
     *
     * @return string|null
     */
    public function extract()
    {
        if (preg_match(self::REGEX_FULLNAME, $this->str, $match)) {
            return $match[0];
        }
    }
}
