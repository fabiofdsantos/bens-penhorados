<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Helpers\Text;

/**
 * This is the text helper test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class TextHelperTest extends AbstractTestCase
{
    public function testRemoveAccents()
    {
        $text = 'àáâãäÀÁÂÃÄèéêẽëÈÉÊẼËìíîĩïÌÍÎĨÏòóôõöÒÓÔÕÖùúûũüÙÚÛŨÜçÇ';
        $expected = 'aaaaaAAAAAeeeeeEEEEEiiiiiIIIIIoooooOOOOOuuuuuUUUUUcC';

        $this->assertSame($expected, Text::removeAccents($text));
    }

    public function testSplitText()
    {
        $text = 'Lorem 2,4.4 ipsum dolor, 4.1,2 sit. Amet, consectetur.';
        $expected = [
            'Lorem 244 ipsum dolor',
            '412 sit',
            'Amet',
            'consectetur',
        ];

        $this->assertSame($expected, Text::splitter($text));
    }

    public function testCleanText()
    {
        $text = "Lorem  \nipsum  \tdolor sit amet,  consectetur adipiscing.";
        $expected = 'Lorem ipsum dolor sit amet, consectetur adipiscing.';

        $this->assertSame($expected, Text::clean($text));
    }
}
