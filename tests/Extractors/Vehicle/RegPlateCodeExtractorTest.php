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
    public function testExtractGeneralFormat()
    {
        $text = 'AA-99-99';
        $this->assertEquals('AA-99-99', $this->extractor->regPlateCode($text));

        $text = '99-AA-99';
        $this->assertEquals('99-AA-99', $this->extractor->regPlateCode($text));

        $text = '99-99-AA';
        $this->assertEquals('99-99-AA', $this->extractor->regPlateCode($text));
    }

    public function testExtractTrailerFormat()
    {
        $text = 'X-0';
        $this->assertEquals('X-0', $this->extractor->regPlateCode($text));

        $text = 'XX-0';
        $this->assertEquals('XX-0', $this->extractor->regPlateCode($text));

        $text = 'X-000000';
        $this->assertEquals('X-000000', $this->extractor->regPlateCode($text));

        $text = 'XX-000000';
        $this->assertEquals('XX-000000', $this->extractor->regPlateCode($text));
    }
}
