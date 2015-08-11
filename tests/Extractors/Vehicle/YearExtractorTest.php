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
        $text = 'ano: 2014';
        $this->assertEquals(2014, $this->extractor->year($text));

        $text = 'ano 2014';
        $this->assertEquals(2014, $this->extractor->year($text));

        $text = 'de: 2014';
        $this->assertEquals(2014, $this->extractor->year($text));

        $text = 'de 2014';
        $this->assertEquals(2014, $this->extractor->year($text));

        $text = 'de 01-02-2014';
        $this->assertEquals(2014, $this->extractor->year($text));

        $text = 'de 01/02/2014';
        $this->assertEquals(2014, $this->extractor->year($text));
    }

    public function testExtractInvalidYear()
    {
        $text = 'ano'.(idate('Y') + 1);
        $this->assertNull($this->extractor->year($text));

        $text = 'ano 1900';
        $this->assertNull($this->extractor->year($text));
    }
}
