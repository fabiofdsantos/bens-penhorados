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

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Laravel\Lumen\Routing\Controller;

/**
 * This is the other results controller class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class OtherResultsController extends Controller
{
    use GenericResultsTrait;

    /**
     * Show a list of other items.
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $genericFilters = self::getGenericFilters($request);

        $items = self::getOtherItems($genericFilters);
        $data = self::paginateOtherItems($items);

        return response()->json($data, 200);
    }

    /**
     * Get other active items.
     *
     * @param array $genericFilters
     *
     * @return LengthAwarePaginator
     */
    public static function getOtherItems($genericFilters)
    {
        $query = self::getIdsOrQueryByGenericFilters($genericFilters);
        $query->where('is_other_type', true);

        return $query->paginate($genericFilters['per_page']);
    }

    /**
     * Paginate other items.
     *
     * @param LengthAwarePaginator $otherItems
     *
     * @return array
     */
    private static function paginateOtherItems(LengthAwarePaginator $otherItems)
    {
        $noResults = $otherItems->isEmpty() ? true : false;

        $data = [];
        $data['from'] = $noResults ? 0 : $otherItems->firstItem();
        $data['to'] = $noResults ? 0 : $otherItems->lastItem();
        $data['total'] = $noResults ? 0 : $otherItems->total();
        $data['limit'] = $noResults ? 0 : $otherItems->perPage();

        $data['items'] = [];
        foreach ($otherItems as $otherItem) {
            $item = [
                    'title'        => $otherItem->title,
                    'slug'         => $otherItem->slug,
                    'price'        => $otherItem->price,
                    'image'        => json_decode($otherItem->images) ? json_decode($otherItem->images)[0] : null,
                    'status'       => $otherItem->status()->pluck('name'),
                    'purchaseType' => $otherItem->purchaseType()->pluck('name'),
                    'location'     => "$otherItem->municipality, $otherItem->district",
                ];

            $data['items'][] = $item;
        }

        return $data;
    }
}
