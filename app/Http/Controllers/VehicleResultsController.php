<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Http\Controllers;

use App\Models\Items\Item;
use App\Models\Items\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * This is the vehicle results controller class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class VehicleResultsController extends Controller
{
    /**
     * Show a list of vehicles.
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $input = [
            'per_page'    => (int) $request->input('limit') ?: 15,
            'make_id'     => (int) $request->input('make') ?: null,
            'model_id'    => (int) $request->input('model') ?: null,
            'category_id' => (int) $request->input('category') ?: null,
            'type_id'     => (int) $request->input('type') ?: null,
        ];

        $vehicles = $this->getVehicles($input);
        $data = $this->paginateVehicles($vehicles);

        return response()->json($data, 200);
    }

    /**
     * Paginate vehicles.
     *
     * @param LengthAwarePaginator $vehicles
     *
     * @return array
     */
    public function paginateVehicles(LengthAwarePaginator $vehicles)
    {
        $noResults = ($vehicles->isEmpty() ? true : false);

        $data = [];
        $data['from'] = ($noResults ? 0 : $vehicles->firstItem());
        $data['to'] = ($noResults ? 0 : $vehicles->lastItem());
        $data['total'] = ($noResults ? 0 : $vehicles->total());
        $data['limit'] = ($noResults ? 0 : $vehicles->perPage());

        $data['items'] = [];
        foreach ($vehicles as $vehicle) {
            $item = [
                    'title' => $vehicle->item->title,
                    'slug'  => $vehicle->item->slug,
                    'price' => $vehicle->item->price,
                    'image' => json_decode($vehicle->item->images)[0],
                    'make'  => $vehicle->make()->pluck('name'),
                    'model' => $vehicle->model()->pluck('name'),
                    'year'  => $vehicle->year,
                    'fuel'  => $vehicle->fuel()->pluck('name'),
                ];

            $data['items'][] = $item;
        }

        return $data;
    }

    /**
     * Get active vehicles.
     *
     * @param array $input
     *
     * @return LengthAwarePaginator
     */
    public function getVehicles($input)
    {
        $query = Vehicle::active();

        if (isset($input['make_id'])) {
            $query->whereMakeId($input['make_id']);
        }

        if (isset($input['model_id'])) {
            $query->whereModelId($input['model_id']);
        }

        if (isset($input['category_id'])) {
            $query->whereCategoryId($input['category_id']);
        }

        if (isset($input['type_id'])) {
            $query->whereTypeId($input['type_id']);
        }

        return $query->paginate($input['per_page']);
    }
}
