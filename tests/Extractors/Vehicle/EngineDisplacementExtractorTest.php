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
        $text = '120 cc';
        $this->assertEquals(120, $this->extractor->engDispl($text));

        $text = '121cc';
        $this->assertEquals(121, $this->extractor->engDispl($text));

        $text = '122 cm3';
        $this->assertEquals(122, $this->extractor->engDispl($text));

        $text = '123 cm³';
        $this->assertEquals(123, $this->extractor->engDispl($text));
    }
}
