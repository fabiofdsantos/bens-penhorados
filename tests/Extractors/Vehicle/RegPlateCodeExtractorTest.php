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
        $text = [
            'AA-99-99' => 'AA-99-99',
            '99-AA-99' => '99-AA-99',
            '99-99-AA' => '99-99-AA',
        ];

        foreach ($text as $input => $expected) {
            $this->assertSame($expected, $this->extractor->regPlateCode($input));
        }
    }

    public function testExtractValidTrailerFormat()
    {
        $text = [
            'X-0'       => 'X-0',
            'XX-0'      => 'XX-0',
            'X-000000'  => 'X-000000',
            'XX-000000' => 'XX-000000',
        ];

        foreach ($text as $input => $expected) {
            $this->assertSame($expected, $this->extractor->regPlateCode($input));
        }
    }

    public function testExtractInvalidGeneralFormat()
    {
        $text = [
            'AAA-00-00',
            'BB-000-00',
            'CC-00-000',
        ];

        foreach ($text as $input => $expected) {
            $this->assertNull($this->extractor->regPlateCode($input));
        }
    }

    public function testExtractInvalidTrailerFormat()
    {
        $text = [
            'A-1234567',
            'AA-1234567',
            'AAA-123456',
        ];

        foreach ($text as $input => $expected) {
            $this->assertNull($this->extractor->regPlateCode($input));
        }
    }
}
