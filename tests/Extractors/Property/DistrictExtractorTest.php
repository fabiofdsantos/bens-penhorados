<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Models\Attributes\Generic\District;

/**
 * This is the district extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class DistrictExtractorTest extends AbstractPropertyExtractorTest
{
    public function testExtractDistrictName()
    {
        $text = [
            'freguesia de Amora, Concelho de Seixal, Distrito de Setúbal' => 'Setúbal',
        ];

        foreach ($text as $input => $expected) {
            $districtId = $this->extractor->district($input, null);

            $this->assertNotNull($districtId, "Input: $input");
            $this->assertSame($expected, District::find($districtId)->name);
        }
    }
}
