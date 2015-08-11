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
 * This is the condition extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class ConditionExtractorTest extends AbstractVehicleExtractorTest
{
    public function testGoodCondition()
    {
        $text = [
            'em bom estado',
            'em estado regular',
            'em regular estado',
            'em estado razoável',
        ];

        foreach ($text as $value) {
            $this->assertTrue($this->extractor->condition($value));
        }
    }

    public function testBadCondition()
    {
        $text = [
            'em mau estado',
            'em estado sucata',
            'encontra-se avariado',
            'mal tratado',
            'tem a pintura riscada',
            'algumas amolgadelas',
            'está danificado',
            'pintura danificada',
        ];

        foreach ($text as $value) {
            $this->assertFalse($this->extractor->condition($value));
        }
    }
}
