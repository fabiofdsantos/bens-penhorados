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
        $str = preg_replace('/(\d+)[,\.](\d+)/', '${1}${1}', $str);

        return preg_split('/\s*[,\.]\s*/', $str, null, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * Clean a given string:
     *  - Remove multiple occurences of whitespaces;
     *  - Remove both \n and \t.
     *
     * @param string $str
     *
     * @return string
     */
    public static function clean($str)
    {
        $str = preg_replace('/\s+/', ' ', $str);
        $str = preg_replace('/\\n|\\t/', '', $str);

        return $str;
    }
}
