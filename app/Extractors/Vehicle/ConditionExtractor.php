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

use App\Extractors\ExtractorInterface;
use App\Helpers\Text;

/**
 * This is the condition extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class ConditionExtractor implements ExtractorInterface
{
    const REGEX_GOOD = [
         '/\b(bom|razoavel|regular)\s(estado)\b/i',
         '/\bestado razoavel\b/i',
     ];

    const REGEX_BAD = [
         '/\bmau estado\b/i',
         '/\bsucata\b/i',
         '/\bavariado\b/i',
         '/\bmal tratado\b/i',
         '/\bpintura riscada\b/i',
         '/\b(amolgad)(o|elas?)\b/i',
     ];

     /**
      * The input string.
      *
      * @var string
      */
     protected $str;

     /**
      * Create a new condition extractor instance.
      *
      * @param array $params
      *
      * @return void
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
