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
 * This is the registration plate code extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class RegPlateCodeExtractorTest extends AbstractVehicleExtractorTest
{
    public function testExtractValidGeneralFormat()
    {
        $text = 'AA-99-99';
        $this->assertSame('AA-99-99', $this->extractor->regPlateCode($text));

        $text = '99-AA-99';
        $this->assertSame('99-AA-99', $this->extractor->regPlateCode($text));

        $text = '99-99-AA';
        $this->assertSame('99-99-AA', $this->extractor->regPlateCode($text));
    }

    public function testExtractValidTrailerFormat()
    {
        $text = 'X-0';
        $this->assertSame('X-0', $this->extractor->regPlateCode($text));

        $text = 'XX-0';
        $this->assertSame('XX-0', $this->extractor->regPlateCode($text));

        $text = 'X-000000';
        $this->assertSame('X-000000', $this->extractor->regPlateCode($text));

        $text = 'XX-000000';
        $this->assertSame('XX-000000', $this->extractor->regPlateCode($text));
    }

    public function testExtractInvalidGeneralFormat()
    {
        $text = 'AAA-00-00';
        $this->assertNull($this->extractor->regPlateCode($text));

        $text = 'BB-000-00';
        $this->assertNull($this->extractor->regPlateCode($text));

        $text = 'CC-00-000';
        $this->assertNull($this->extractor->regPlateCode($text));
    }

    public function testExtractInvalidTrailerFormat()
    {
        $text = 'A-1234567';
        $this->assertNull($this->extractor->regPlateCode($text));

        $text = 'AA-1234567';
        $this->assertNull($this->extractor->regPlateCode($text));

        $text = 'AAA-123456';
        $this->assertNull($this->extractor->regPlateCode($text));
    }
}
