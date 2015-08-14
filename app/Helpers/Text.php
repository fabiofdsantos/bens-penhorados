<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Helpers;

use Illuminate\Support\Str;

/**
 * This is the text helper class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class Text
{
    /**
     * Remove accents from a given string.
     *
     * @param string $str
     *
     * @return string
     */
    public static function removeAccents($str)
    {
        return Str::ascii($str);
    }

    /**
     * Split a given string into an array of substrings:
     *  1. Remove dots/commas between numbers;
     *  2. Break on dots/commas.
     *
     * @param string $str
     *
     * @return array
     */
    public static function splitter($str)
    {
        $str = preg_replace('/(\d+)[,\.](\d+)[,\.]?(\d+)?/', '${1}${2}${3}', $str);

        return preg_split('/\s*[,\.]\s*/', $str, null, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * Clean a given string:
     *  - Remove both \n and \t;
     *  - Remove multiple occurences of whitespaces.
     *
     * @param string $str
     *
     * @return string
     */
    public static function clean($str)
    {
        $str = preg_replace('/\\n|\\t/', '', $str);
        $str = preg_replace('/\s+/', ' ', $str);

        return $str;
    }

    /**
     * Prettify a given name.
     *
     * An example:
     * 	- Input: FABIO DOS SANTOS
     *  - Output: Fabio dos Santos
     *
     * @param str $str
     *
     * @return string
     */
    public static function prettifyName($str)
    {
        $str = strtolower($str);
        $str = preg_replace_callback('/\b(\w)(?!([oa]s|[aeo])?\b)/u', function ($matches) {
                return strtoupper($matches[0]);
            }, $str);

        return $str;
    }
}
