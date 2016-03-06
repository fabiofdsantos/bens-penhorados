<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Http\Controllers\Results;

use App\Models\Items\Item;
use Illuminate\Http\Request;

/**
 * This is the generic results trait class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
trait GenericResultsTrait
{
    /**
     * The type of an item.
     *
     * @var string|null
     */
    protected static $itemType;

    /**
     * Get vehicle filters from the input.
     *
     * @param Request $request
     *
     * @return array
     */
    private static function getGenericFilters(Request $request)
    {
        $filters = [
            'per_page'         => (int) $request->input('limit') ?: 10,
            'district_id'      => $request->input('district'),
            'municipality_id'  => $request->input('municipality'),
            'purchase_type_id' => $request->input('purchasetype'),
            'with_images'      => $request->input('withimages'),
            'ignore_suspended' => $request->input('nosuspended'),
            'min_price'        => $request->input('minprice'),
            'max_price'        => $request->input('maxprice'),
            'no_price'         => $request->input('noprice'),
            'search_query'     => $request->input('q'),
        ];

        return $filters;
    }

    /**
     * Get ids by applying generic filters.
     *
     * @param array $filters
     *
     * @return \Illuminate\Database\Eloquent\Builder|array
     */
    private static function getIdsOrQueryByGenericFilters($filters)
    {
        $query = Item::active()->ofType(self::$itemType);

        $query->ofDistrict($filters['district_id']);
        $query->ofMunicipality($filters['municipality_id']);
        $query->ofPurchaseType($filters['purchase_type_id']);
        $query->betweenPrices($filters['min_price'], $filters['max_price']);
        $query->searchQuery($filters['search_query']);

        if (isset($filters['with_images'])) {
            $query->onlyWithImages();
        }
        if (isset($filters['ignore_suspended'])) {
            $query->ignoreSuspended();
        }
        if (isset($filters['no_price'])) {
            $query->whereNull('price');
        }

        // Order by price
        $query->orderBy(\DB::raw('ISNULL(price), price'), 'asc');

        if (!self::$itemType) {
            return $query;
        }

        return $query->lists('itemable_id')->all();
    }
}
