<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Models\Attributes\Vehicle\VehicleCategory;

/**
 * This is the vehicle category extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class VehicleCategoryExtractorTest extends AbstractVehicleExtractorTest
{
    public function testExtractVehicleValidCategory()
    {
        $text = [
            'ciclomotor da marca APRILIA'    => 'Ciclomotor',
            'veículo ligeiro de passageiros' => 'Automóvel ligeiro',
            'veículo pesado'                 => 'Automóvel pesado',
            'triciclo'                       => 'Triciclo',
            'tractor'                        => 'Tractor agrícola/florestal',
            'trator'                         => 'Tractor agrícola/florestal',
            'tractocarro'                    => 'Tractocarro',
            'tratocarro'                     => 'Tractocarro',
            'motocultivador'                 => 'Motocultivador',
            'moto-cultivador'                => 'Motocultivador',
            'reboque'                        => 'Reboque',
            'semi-reboque'                   => 'Reboque',
            'empilhador'                     => 'Máquina industrial',
        ];

        foreach ($text as $input => $expected) {
            $categoryId = $this->extractor->category($input);

            $this->assertNotNull($categoryId);
            $this->assertSame($expected, VehicleCategory::find($categoryId)->name);
        }
    }
}
