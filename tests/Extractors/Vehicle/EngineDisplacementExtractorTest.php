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
 * This is the engine displacement extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class EngineDisplacementExtractorTest extends AbstractVehicleExtractorTest
{
    public function testExtractEngineDisplacement()
    {
        $text = [
            '120 cc'    => 120,
            '121cc'     => 121,
            '122 cm3'   => 122,
            '123 cm³'   => 123,
            '1686 c.c.' => 1686,
        ];

        foreach ($text as $input => $expected) {
            $this->assertSame($expected, $this->extractor->engDispl($input));
        }
    }
}
