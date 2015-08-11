<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Extractors;

/**
 * This is the generic extractor wrapper.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 *
 * @method \Carbon\Carbon|null datetime(string $str)
 * @method string|null         email(string $str)
 * @method string|null         fullName(string $str)
 * @method int|null            phoneNumber(string $str)
 * @method int|null            purchaseType(string $str)
 * @method int|null            price(string $str)
 * @method array               startEndDatetime(string $str)
 * @method int|null            status(string $str)
 * @method int|null            vat(string $str)
 */
class GenericExtractorWrapper extends AbstractExtractorWrapper
{
    const EXTRACTORS = [
        'datetime'          => '\App\Extractors\Generic\DateTimeExtractor',
        'email'             => '\App\Extractors\Generic\EmailExtractor',
        'fullName'          => '\App\Extractors\Generic\FullNameExtractor',
        'purchaseType'      => '\App\Extractors\Generic\PurchaseTypeExtractor',
        'phoneNumber'       => '\App\Extractors\Generic\PhoneNumberExtractor',
        'price'             => '\App\Extractors\Generic\PriceExtractor',
        'startEndDatetime'  => '\App\Extractors\Generic\StartEndDateTimeExtractor',
        'status'            => '\App\Extractors\Generic\StatusExtractor',
        'vat'               => '\App\Extractors\Generic\VatExtractor',
    ];
}
