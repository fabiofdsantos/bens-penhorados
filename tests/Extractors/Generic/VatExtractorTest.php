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
 * This is the vat extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class VatExtractorTest extends AbstractGenericExtractorTest
{
    public function testExtractVat()
    {
        $text = [
            '€ 1,00 (23,00% IVA incluído)'    => 23,
            '€ 3.542,90 (0,00% IVA incluído)' => null,
        ];

        foreach ($text as $input => $expected) {
            $this->assertEquals($expected, $this->extractor->vat($input));
        }
    }
}
