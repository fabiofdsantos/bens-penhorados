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
 * This is the year extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class YearExtractor extends AbstractExtractor
{
    const REGEX_YEAR = '/(\bano\b|\bde\b)[\pP\s]*?.*?[matricula]?[\pP\s]*?(\d+\pP\d+\pP)?(\d{4})/i';

    /**
     * Create a new year extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::removeAccents($params[0]);
    }

    /**
     * Extract the year.
     *
     * @return int|null
     */
    public function extract()
    {
        if (preg_match(self::REGEX_YEAR, $this->str, $match)) {
            return $this->isValidYear($match[3]) ? (integer) $match[3] : null;
        }
    }

    /**
     * Check if a given year is valid.
     *
     * @param int $year
     *
     * @return bool
     */
    private function isValidYear($year)
    {
        if ($year <= idate('Y') && $year >= 1950) {
            return true;
        }

        return false;
    }
}
