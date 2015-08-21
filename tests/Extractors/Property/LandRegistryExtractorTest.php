<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Models\Attributes\Property\LandRegistry;

/**
 * This is the land registry extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class LandRegistryExtractorTest extends AbstractPropertyExtractorTest
{
    public function testExtractLandRegistry()
    {
        $text = [
            'matriz urbana'           => 'Urbano',
            'prédio urbano'           => 'Urbano',
            'prédio rústico'          => 'Rústico',
            'matriz rústica'          => 'Rústico',
            'Misto'                   => 'Misto',
            'Terreno para construção' => 'Urbano',
            'destinado a habitação'   => 'Urbano',
            'destinado a comércio'    => 'Urbano',
            'destinado a serviços'    => 'Urbano',
            'afectação: habitação'    => 'Urbano',
        ];

        foreach ($text as $input => $expected) {
            $landRegistryId = $this->extractor->landRegistry($input);

            $this->assertNotNull($landRegistryId, "Input: $input");
            $this->assertSame($expected, LandRegistry::find($landRegistryId)->name);
        }
    }
}
