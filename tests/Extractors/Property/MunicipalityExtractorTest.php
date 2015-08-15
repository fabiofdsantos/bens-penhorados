<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Models\Attributes\Generic\Municipality;

/**
 * This is the municipality extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class MunicipalityExtractorTest extends AbstractPropertyExtractorTest
{
    public function testExtractMunicipality()
    {
        $text = [
            'e descrito na Conservatória do Registo Predial de Seixal' => 'Seixal',
            'freguesia da Portimão concelho de Portimão'               => 'Portimão',
        ];

        foreach ($text as $input => $expected) {
            $municipalityId = $this->extractor->municipality($input, null);

            $this->assertNotNull($municipalityId);
            $this->assertSame($expected, Municipality::find($municipalityId)->name);
        }
    }
}
