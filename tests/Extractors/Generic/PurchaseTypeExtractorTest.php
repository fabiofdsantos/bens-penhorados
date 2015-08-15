<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Models\Attributes\Generic\ItemPurchaseType;

/**
 * This is the purchase type extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class PurchaseTypeExtractorTest extends AbstractGenericExtractorTest
{
    public function testExtractPurchaseType()
    {
        $text = [
            'carta fechada'         => 'Proposta em carta fechada',
            'negociação particular' => 'Negociação particular',
            'leilão'                => 'Leilão eletrónico',
        ];

        foreach ($text as $input => $expected) {
            $purchaseTypeId = $this->extractor->purchaseType($input);

            $this->assertNotNull($purchaseTypeId);
            $this->assertSame($expected, ItemPurchaseType::find($purchaseTypeId)->name);
        }
    }
}
