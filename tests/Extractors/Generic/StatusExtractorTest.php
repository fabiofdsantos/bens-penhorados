<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Models\Attributes\Generic\ItemStatus;

/**
 * This is the status extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class StatusExtractorTest extends AbstractGenericExtractorTest
{
    public function testExtractStatus()
    {
        $text = [
            'Em curso' => 'Em curso',
            'Suspenso' => 'Suspenso',
        ];

        foreach ($text as $input => $expected) {
            $statusId = $this->extractor->status($input);

            $this->assertNotNull($statusId);
            $this->assertSame($expected, ItemStatus::find($statusId)->name);
        }
    }
}
