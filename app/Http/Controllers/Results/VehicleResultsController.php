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

use App\Models\Items\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Laravel\Lumen\Routing\Controller;

/**
 * This is the vehicle results controller class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class VehicleResultsController extends Controller
{
    use GenericResultsTrait;

    public function __construct()
    {
        self::$itemType = Vehicle::class;
    }

    /**
     * Show a list of vehicles.
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $genericFilters = self::getGenericFilters($request);
        $vehicleFilters = self::getVehicleFilters($request);

        $vehicles = self::getVehicles($genericFilters, $vehicleFilters);
        $data = self::paginateVehicles($vehicles);

        return response()->json($data, 200);
    }

    /**
     * Get active vehicles.
     *
     * @param array $genericFilters
     * @param array $vehicleFilters
     *
     * @return LengthAwarePaginator
     */
    public static function getVehicles($genericFilters, $vehicleFilters)
    {
        $ids = self::getIdsOrQueryByGenericFilters($genericFilters);
        $query = self::getQueryByVehicleFilters($ids, $vehicleFilters);

        return $query->paginate($genericFilters['per_page']);
    }

    /**
     * Paginate vehicles.
     *
     * @param LengthAwarePaginator $vehicles
     *
     * @return array
     */
    private static function paginateVehicles(LengthAwarePaginator $vehicles)
    {
        $data = [];
        $data['from'] = $vehicles->isEmpty() ? 0 : $vehicles->firstItem();
        $data['to'] = $vehicles->isEmpty() ? 0 : $vehicles->lastItem();
        $data['total'] = $vehicles->isEmpty() ? 0 : $vehicles->total();
        $data['limit'] = $vehicles->isEmpty() ? 0 : $vehicles->perPage();

        $data['items'] = [];
        foreach ($vehicles as $vehicle) {
            $item = [
                'title'        => $vehicle->item->title,
                'slug'         => $vehicle->item->slug,
                'price'        => $vehicle->item->price,
                'image'        => json_decode($vehicle->item->images) ? json_decode($vehicle->item->images)[0] : null,
                'status'       => $vehicle->item->status()->pluck('name'),
                'purchaseType' => $vehicle->item->purchaseType()->pluck('name'),
                'location'     => "{$vehicle->item->municipality}, {$vehicle->item->district}",
            ];

            $data['items'][] = $item;
        }

        return $data;
    }

    /**
     * Get vehicle filters from the input.
     *
     * @param Request $request
     *
     * @return array
     */
    private static function getVehicleFilters(Request $request)
    {
        $filters = [
            'make_id'           => $request->input('make'),
            'model_id'          => $request->input('model'),
            'category_id'       => $request->input('category'),
            'type_id'           => $request->input('type'),
            'color_id'          => $request->input('color'),
            'fuel_id'           => $request->input('fuel'),
            'min_year'          => $request->input('minyear'),
            'max_year'          => $request->input('maxyear'),
            'is_good_condition' => is_null($request->input('goodcondition')) ? null : (bool) $request->input('goodcondition'),
        ];

        return $filters;
    }

    /**
     * Get a query by applying vehicle filters.
     *
     * @param array $ids
     * @param array $filters
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private static function getQueryByVehicleFilters($ids, $filters)
    {
        $query = Vehicle::whereIn('id', $ids);

        $query->ofMake($filters['make_id']);
        $query->ofModel($filters['model_id']);
        $query->ofCategory($filters['category_id']);
        $query->ofType($filters['type_id']);
        $query->ofColor($filters['color_id']);
        $query->ofFuel($filters['fuel_id']);
        $query->betweenYears($filters['min_year'], $filters['max_year']);
        $query->isGoodCondition($filters['is_good_condition']);

        // http://dba.stackexchange.com/questions/109120/how-does-order-by-field-in-mysql-work-internally
        if (!empty($ids)) {
            $ids = implode(',', $ids);
            $query->orderByRaw(\DB::raw("FIELD(id, $ids)"));
        }

        return $query;
    }
}
