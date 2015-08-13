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
 * This is the start/end datetime extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class StartEndDateTimeExtractorTest extends AbstractGenericExtractorTest
{
    public function testExtractStartEndDateTime()
    {
        $text = '2015-07-20 às 09:00 a 2015-08-15 às 10:40 (PEF 3085201201037951 e aps.';

        $result = $this->extractor->startEndDatetime($text);

        $expectedStart = Carbon::createFromFormat('Y-m-d-H:i', '2015-07-20-09:00');
        $this->assertInstanceOf(get_class($expectedStart), $result[0]);
        $this->assertEquals(get_object_vars($expectedStart), get_object_vars($result[0]));

        $expectedEnd = Carbon::createFromFormat('Y-m-d-H:i', '2015-08-15-10:40');
        $this->assertInstanceOf(get_class($expectedEnd), $result[1]);
        $this->assertEquals(get_object_vars($expectedEnd), get_object_vars($result[1]));
    }
}
