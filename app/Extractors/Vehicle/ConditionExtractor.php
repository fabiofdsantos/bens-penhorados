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
 * This is the condition extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class ConditionExtractor extends AbstractExtractor
{
    const REGEX_GOOD = [
        '/\b(bom|razoavel|regular)\s*(estado)\b/i',
        '/\b(estado)\s(razoavel|regular)\b/i',
    ];

    const REGEX_BAD = [
        '/\bmau\s*estado\b/i',
        '/\bsucata\b/i',
        '/\bavariado\b/i',
        '/\bmal\s*tratado\b/i',
        '/\bpintura\s*riscada\b/i',
        '/\b(amolgad)(o|elas?)\b/i',
        '/\bdanificad[oa]\b/i',
        '/\bavaria\b/i',
        '/acidentad[oa]/i',
        '/nao\s*circula/i',
    ];

    /**
     * Create a new condition extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::removeAccents($params[0]);
    }

    /**
     * Extract and check the condition.
     *
     * @return bool|null
     */
    public function extract()
    {
        foreach (self::REGEX_GOOD as $regex) {
            if (preg_match($regex, $this->str)) {
                return true;
            }
        }

        foreach (self::REGEX_BAD as $regex) {
            if (preg_match($regex, $this->str)) {
                return false;
            }
        }
    }
}
