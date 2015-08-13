<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Carbon\Carbon;

/**
 * This is the datetime extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class DateTimeExtractorTest extends AbstractGenericExtractorTest
{
    public function testExtractDateTime()
    {
        $text = [
            '2015-08-15'                  => Carbon::createFromFormat('Y-m-d', '2015-08-15'),
            '2015-08-16 às 10:50'         => Carbon::createFromFormat('Y-m-d-H:i', '2015-08-16-10:50'),
            'LISBOA, 2015-08-17 às 11:00' => Carbon::createFromFormat('Y-m-d-H:i', '2015-08-17-11:00'),
        ];

        foreach ($text as $input => $expected) {
            $result = $this->extractor->datetime($input);

            $this->assertInstanceOf(get_class($expected), $result);
            $this->assertEquals(get_object_vars($expected), get_object_vars($result));
        }
    }
}
