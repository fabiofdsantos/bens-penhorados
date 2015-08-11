<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * This is the price extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class PriceExtractorTest extends AbstractGenericExtractorTest
{
    public function testExtractPrice()
    {
        $text = [
            '€ 1,00 (23,00% IVA incluído)'     => 1,
            '€ 3.542,90 (23,00% IVA incluído)' => 3542.90,
            '€ 4.200,00'                       => 4200,
        ];

        foreach ($text as $input => $expected) {
            $this->assertEquals($expected, $this->extractor->price($input));
        }
    }
}
