<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Http\Controllers\FilteringAttributes;

use App\Models\Attributes\Generic\District;
use App\Models\Attributes\Generic\ItemPurchaseType;
use App\Models\Attributes\Generic\Municipality;

/**
 * This is the generic's filtering attributes trait class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
trait GenericFilteringAttributesTrait
{
    /**
     * The type of an item.
     *
     * @var string|null
     */
    protected static $itemType;

    /**
     * Get generic filtering attributes.
     *
     * There are attributes related to each other. For example, municipalities
     * are shown if the district was also set.
     *
     * @param int|null $districtId
     *
     * @return array
     */
    private static function getGenericFilteringAttr($districtId)
    {
        $genericAttr = [
            'districts'      => self::getDistricts(),
            'municipalities' => self::getMunicipalities($districtId),
            'purchaseTypes'  => self::getPurchaseTypes(),
        ];

        return $genericAttr;
    }

    /**
     * Get districts.
     *
     * @return array|null
     */
    private static function getDistricts()
    {
        return District::assignedTo(self::$itemType)->lists('name', 'id')->all() ?: null;
    }

    /**
     * Get municipalities.
     *
     * @param int|null $districtId
     *
     * @return array|null
     */
    private static function getMunicipalities($districtId)
    {
        if (isset($districtId)) {
            return Municipality::assignedTo(self::$itemType)->ofDistrict($districtId)->lists('name', 'id')->all() ?: null;
        }
    }

    /**
     * Get purchase types.
     *
     * @return array|null
     */
    private static function getPurchaseTypes()
    {
        return ItemPurchaseType::assignedTo(self::$itemType)->lists('name', 'id')->all() ?: null;
    }
}
