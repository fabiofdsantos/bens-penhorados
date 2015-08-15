<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Models\Attributes\Vehicle\VehicleType;

/**
 * This is the vehicle type extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class VehicleTypeExtractorTest extends AbstractVehicleExtractorTest
{
    public function testNormalExtractValidVehicleType()
    {
        $text = [
            'tipo passageiros'  => 'Passageiros',
            'tipo: mercadorias' => 'Mercadorias',
        ];

        foreach ($text as $input => $expected) {
            $typeId = $this->extractor->type($input, false);

            $this->assertNotNull($typeId, "Input: $input");
            $this->assertSame($expected, VehicleType::find($typeId)->name);
        }
    }

    public function testForceExtractValidVehicleType()
    {
        $text = [
            'tipo passageiros'  => 'Passageiros',
            'tipo: mercadorias' => 'Mercadorias',
        ];

        foreach ($text as $input => $expected) {
            $typeId = $this->extractor->type($input, true);

            $this->assertNotNull($typeId, "Input: $input");
            $this->assertSame($expected, VehicleType::find($typeId)->name);
        }
    }

    public function testForceExtractInvalidVehicleType()
    {
        $text = 'espaço para mercadorias e 5 passageiros';

        $typeId = $this->extractor->type($text, true);
        $this->assertNull($typeId);
    }
}
