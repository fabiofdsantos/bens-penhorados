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
use App\Models\Attributes\Vehicle\VehicleModel;

/**
 * This is the model extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class ModelExtractorTest extends AbstractVehicleExtractorTest
{
    public function testExtractModelOfMake()
    {
        $text = [
            'BT-50'   => 'BT-50',
            'BT 50'   => 'BT-50',
            'BT50'    => 'BT-50',
            'BT(50)'  => 'BT-50',
            'Premacy' => 'Premacy',
            '323'     => '323',
            '2'       => '2',
        ];

        foreach ($text as $input => $expected) {
            $makeId = VehicleMake::where('name', 'Mazda')->pluck('id');
            $modelId = $this->extractor->model($input, $makeId);

            $this->assertNotNull($modelId, "Input: $input");
            $this->assertSame($expected, VehicleModel::find($modelId)->name);
        }

        $text = [
            '900'  => '900',
            '9000' => '9000',
        ];

        foreach ($text as $input => $expected) {
            $makeId = VehicleMake::where('name', 'Saab')->pluck('id');
            $modelId = $this->extractor->model($input, $makeId);

            $this->assertNotNull($modelId, "Input: $input");
            $this->assertSame($expected, VehicleModel::find($modelId)->name);
        }
    }
}
