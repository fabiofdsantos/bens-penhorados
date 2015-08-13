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
 * This is the email extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class EmailExtractor extends AbstractExtractor
{
    const REGEX_EMAIL = '/.+@.+\.\w{1,}/i';

    /**
     * Create a new email extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::clean($params[0]);
    }

    /**
     * Extract the email.
     *
     * @return string|null
     */
    public function extract()
    {
        if (preg_match(self::REGEX_EMAIL, $this->str, $match)) {
            return strtolower($match[0]);
        }
    }
}
