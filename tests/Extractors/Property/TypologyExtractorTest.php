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
 * This is the typology extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class TypologyExtractorTest extends AbstractPropertyExtractorTest
{
    public function testExtractValidTypology()
    {
        $text = [
            'Tipologia: T 4' => 4,
            't1'             => 1,
            't-3'            => 3,
        ];

        foreach ($text as $input => $expected) {
            $this->assertSame($expected, $this->extractor->typology($input));
        }
    }

    public function testExtractInvalidTypology()
    {
        $text = [
            'artº 17859',
        ];

        foreach ($text as $input) {
            $this->assertNull($this->extractor->typology($input));
        }
    }
}
