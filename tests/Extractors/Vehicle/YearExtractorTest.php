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
 * This is the year extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class YearExtractorTest extends AbstractVehicleExtractorTest
{
    public function testExtractValidYear()
    {
        $text = [
            'ano: 2009'                      => 2009,
            'ano 2010'                       => 2010,
            'de: 2011'                       => 2011,
            'de 2012'                        => 2012,
            'de 01-02-2013'                  => 2013,
            'de 01/02/2014'                  => 2014,
            'ano da primeira matricula 1992' => 1992,
        ];

        foreach ($text as $input => $expected) {
            $this->assertSame($expected, $this->extractor->year($input));
        }
    }

    public function testExtractInvalidYear()
    {
        $text = [
            'ano '.(idate('Y') + 1),
            'ano 1900',
        ];

        foreach ($text as $input) {
            $this->assertNull($this->extractor->year($input));
        }
    }
}
