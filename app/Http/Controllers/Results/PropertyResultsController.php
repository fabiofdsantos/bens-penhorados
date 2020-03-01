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

use App\Models\Items\Property;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Laravel\Lumen\Routing\Controller;

/**
 * This is the property results controller class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class PropertyResultsController extends Controller
{
    use GenericResultsTrait;

    public function __construct()
    {
        self::$itemType = Property::class;
    }

    /**
     * Show a list of properties.
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $genericFilters = self::getGenericFilters($request);
        $propertyFilters = self::getPropertyFilters($request);

        $properties = self::getProperties($genericFilters, $propertyFilters);
        $data = self::paginateProperties($properties);

        return response()->json($data, 200);
    }

    /**
     * Get active properties.
     *
     * @param array $genericFilters
     * @param array $propertyFilters
     *
     * @return LengthAwarePaginator
     */
    public static function getProperties($genericFilters, $propertyFilters)
    {
        $ids = self::getIdsOrQueryByGenericFilters($genericFilters);
        $query = self::getQueryByPropertyFilters($ids, $propertyFilters);

        return $query->paginate($genericFilters['per_page']);
    }

    /**
     * Paginate properties.
     *
     * @param LengthAwarePaginator $properties
     *
     * @return array
     */
    private static function paginateProperties(LengthAwarePaginator $properties)
    {
        $data = [];
        $data['from'] = $properties->isEmpty() ? 0 : $properties->firstItem();
        $data['to'] = $properties->isEmpty() ? 0 : $properties->lastItem();
        $data['total'] = $properties->isEmpty() ? 0 : $properties->total();
        $data['limit'] = $properties->isEmpty() ? 0 : $properties->perPage();

        $data['items'] = [];
        foreach ($properties as $property) {
            $item = [
                'title'        => $property->item->title,
                'slug'         => $property->item->slug,
                'price'        => $property->item->price,
                'image'        => json_decode($property->item->images) ? json_decode($property->item->images)[0] : null,
                'status'       => $property->item->status()->pluck('name'),
                'purchaseType' => $property->item->purchaseType()->pluck('name'),
                'location'     => "{$property->item->municipality}, {$property->item->district}",
            ];

            $data['items'][] = $item;
        }

        return $data;
    }

    /**
     * Get property filters from the input.
     *
     * @param Request $request
     *
     * @return array
     */
    private static function getPropertyFilters(Request $request)
    {
        $filters = [
            'typology'         => $request->input('typology'),
            'land_registry_id' => $request->input('landregistry'),
        ];

        return $filters;
    }

    /**
     * Get a query by applying property filters.
     *
     * @param array $ids
     * @param array $filters
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private static function getQueryByPropertyFilters($ids, $filters)
    {
        $query = Property::whereIn('id', $ids);

        $query->ofTypology($filters['typology']);
        $query->ofLandRegistry($filters['land_registry_id']);

        // http://dba.stackexchange.com/questions/109120/how-does-order-by-field-in-mysql-work-internally
        if (!empty($ids)) {
            $ids = implode(',', $ids);
            $query->orderByRaw(\DB::raw("FIELD(id, $ids)"));
        }

        return $query;
    }
}
