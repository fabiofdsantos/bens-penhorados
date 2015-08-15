<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Models\Attributes\Vehicle\VehicleMake;

/**
 * This is the make extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class MakeExtractorTest extends AbstractVehicleExtractorTest
{
    public function testExtractMake()
    {
        $text = [
            'peugeot'    => 'Peugeot',
            'alfa-romeo' => 'Alfa Romeo',
            'alfa romeo' => 'Alfa Romeo',
        ];

        foreach ($text as $input => $expected) {
            $makeId = $this->extractor->make($input);

            $this->assertNotNull($makeId, "Input: $input");
            $this->assertSame($expected, VehicleMake::find($makeId)->name);
        }
    }
}
