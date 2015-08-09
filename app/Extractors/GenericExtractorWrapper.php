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
 */
class GenericExtractorWrapper extends AbstractExtractorWrapper
{
    /**
     * The generic's extractors.
     *
     * @var array
     */
    protected $extractors = [
        'datetime'          => '\App\Extractors\Generic\DateTimeExtractor',
        'email'             => '\App\Extractors\Generic\EmailExtractor',
        'fullName'          => '\App\Extractors\Generic\FullNameExtractor',
        'mode'              => '\App\Extractors\Generic\ModeExtractor',
        'phoneNumber'       => '\App\Extractors\Generic\PhoneNumberExtractor',
        'price'             => '\App\Extractors\Generic\PriceExtractor',
        'startEndDatetime'  => '\App\Extractors\Generic\StartEndDateTimeExtractor',
        'status'            => '\App\Extractors\Generic\StatusExtractor',
        'vat'               => '\App\Extractors\Generic\VatExtractor',
    ];
}
