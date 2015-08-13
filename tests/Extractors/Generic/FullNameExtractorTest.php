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
 * This is the full name extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class FullNameExtractorTest extends AbstractGenericExtractorTest
{
    public function testExtractFullName()
    {
        $text = [
            'CARLA SOFIA LEITÃO DA SILVA (Telf: 912345678)' => 'CARLA SOFIA LEITÃO DA SILVA',
            'PINGO DA UVA UNIPESSOAL LDA'                   => 'PINGO DA UVA UNIPESSOAL LDA',
        ];

        foreach ($text as $input => $expected) {
            $this->assertSame($expected, $this->extractor->fullName($input));
        }
    }
}
