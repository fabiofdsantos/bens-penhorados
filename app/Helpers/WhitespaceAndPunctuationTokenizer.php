<?php

namespace App\Helpers;

/**
 * Breaks either on whitespace or on word boundaries (ex.: dots, commas, etc)
 * Does not include white space or word boundaries in tokens.
 *
 * @author: Sam Hocevar <sam@hocevar.net>
 */
class WhitespaceAndPunctuationTokenizer
{
    /**
     * Splits a given text into smaller units called token.
     *
     * Regex explanation:
     * \pP matches any kind of punctuation character
     * \pZ matches any kind of whitespace or invisible separator
     * \pC matches invisible control characters and unused code points.
     *
     * @param string $str
     *
     * @return array
     */
    public function tokenize($str)
    {
        $result = array();

        $pattern = '/([\pZ\pC]*)([^\pP\pZ\pC]+|.)([\pZ\pC]*)/u';
        preg_match_all($pattern, $str, $result);

        return $result[2];
    }
}
