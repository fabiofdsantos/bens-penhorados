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
 * This is the phone number extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class PhoneNumberExtractorTest extends AbstractGenericExtractorTest
{
    public function testExtractPhoneNumber()
    {
        $text = [
            'CARLA SOFIA LEITÃO DA SILVA (Telf: 912345678)' => 912345678,
        ];

        foreach ($text as $input => $expected) {
            $this->assertSame($expected, $this->extractor->phoneNumber($input));
        }
    }
}
