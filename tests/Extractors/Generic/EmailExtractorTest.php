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
 * This is the email extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class EmailExtractorTest extends AbstractGenericExtractorTest
{
    public function testExtractValidEmail()
    {
        $text = [
            'a@b.c'                 => 'a@b.c',
            'a@b.com'               => 'a@b.com',
            '123456@123.com'        => '123456@123.com',
            'test@fabiosantos.pt'   => 'test@fabiosantos.pt',
            'test_2@fabiosantos.pt' => 'test_2@fabiosantos.pt',
            'test-2@fabiosantos.pt' => 'test-2@fabiosantos.pt',
            'test.3@fabiosantos.pt' => 'test.3@fabiosantos.pt',
        ];

        foreach ($text as $input => $expected) {
            $this->assertSame($expected, $this->extractor->email($input));
        }
    }

    public function testExtractInvalidEmail()
    {
        $text = [
            '@fabiosantos.pt' => null,
            'fabiosantos-pt'  => null,
            'fabiosantos'     => null,
            '.pt'             => null,
        ];

        foreach ($text as $input => $expected) {
            $this->assertSame($expected, $this->extractor->email($input));
        }
    }
}
