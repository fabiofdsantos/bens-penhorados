<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Models\Attributes\Generic\ItemTaxOffice;
use App\Models\Attributes\Generic\Municipality;

/**
 * This is the status extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class TaxOfficeExtractorTest extends AbstractGenericExtractorTest
{
    public function testExtractTaxOfficeNumber()
    {
        $text = [
            '2313' => null,     // Ponte da Barca
            '3417' => 2,        // Aveiro 2
            '0051' => 1,        // Aveiro 1
        ];

        foreach ($text as $input => $expected) {
            $taxOfficeId = $this->extractor->taxOffice($input);

            $this->assertNotNull($taxOfficeId);
            $this->assertEquals($expected, ItemTaxOffice::find($taxOfficeId)->number);
        }
    }

    public function testExtractTaxOfficeMunicipality()
    {
        $text = [
            '2313' => 'Ponte da Barca',
            '3417' => 'Aveiro',
            '0051' => 'Aveiro',
        ];

        foreach ($text as $input => $expected) {
            $taxOfficeId = $this->extractor->taxOffice($input);
            $this->assertNotNull($taxOfficeId);

            $municipalityId = ItemTaxOffice::find($taxOfficeId)->municipality_id;
            $this->assertNotNull($municipalityId);

            $this->assertEquals($expected, Municipality::find($municipalityId)->name);
        }
    }
}
