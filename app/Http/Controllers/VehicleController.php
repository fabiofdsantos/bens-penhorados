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
 * This is the vehicle controller class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class VehicleController extends Controller
{
    const DATETIME_FORMAT = 'd-m-Y \à\s H:i';

    /**
     * Show a list of vehicles.
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $perPage = (int) $request->input('limit') ?: 15;
        $makeId = (int) $request->input('make') ?: null;
        $modelId = (int) $request->input('model') ?: null;

        $vehicles = $this->getVehicles($perPage, $makeId, $modelId);
        $data = $this->paginateVehicles($vehicles);

        return response()->json($data, 200);
    }

    /**
     * Show a single vehicle.
     *
     * @param string $slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show($slug)
    {
        $data = $this->getSingleVehicle($slug);

        if (empty($data)) {
            return response()->json($data, 404);
        }

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
     * Get vehicles.
     *
     * @param int      $perPage
     * @param int|null $makeId
     * @param int|null $modelId
     *
     * @return LengthAwarePaginator
     */
    public function getVehicles($perPage, $makeId, $modelId)
    {
        $query = Vehicle::active();

        if (isset($makeId)) {
            $query->whereMakeId($makeId);
        }

        if (isset($modelId)) {
            $query->whereModelId($modelId);
        }

        return $query->paginate($perPage);
    }

    /**
     * Get a single vehicle.
     *
     * @param string $slug
     *
     * @return array
     */
    public function getSingleVehicle($slug)
    {
        $generic = Item::withSlug($slug)->first();

        if (empty($generic)) {
            return [];
        }

        $vehicle = Vehicle::find($generic->itemable_id);
        $item = [
            'code'           => $generic->code,
            'taxOffice'      => $generic->tax_office,
            'title'          => $generic->title,
            'slug'           => $generic->slug,
            'price'          => $generic->price,
            'vat'            => $generic->vat,
            'status'         => $generic->status()->pluck('name'),
            'mode'           => $generic->purchaseType()->pluck('name'),
            'description'    => $generic->full_description,
            'images'         => json_decode($generic->images),
            'previewDtStart' => $generic->preview_dt_start->format(self::DATETIME_FORMAT),
            'previewDtEnd'   => $generic->preview_dt_end->format(self::DATETIME_FORMAT),
            'openingDt'      => $generic->opening_dt->format(self::DATETIME_FORMAT),
            'acceptanceDt'   => $generic->acceptance_dt->format(self::DATETIME_FORMAT),
            'year'           => $vehicle->year,
            'make'           => $vehicle->make()->pluck('name'),
            'model'          => $vehicle->model()->pluck('name'),
            'category'       => $vehicle->category()->pluck('name'),
            'type'           => $vehicle->type()->pluck('name'),
            'color'          => $vehicle->color()->pluck('name'),
            'fuel'           => $vehicle->fuel()->pluck('name'),
            'goodCondition'  => is_null($vehicle->is_good_condition) ? null : (bool) $vehicle->is_good_condition,
            'engDispl'       => $vehicle->engine_displacement,
            'regPlateCode'   => $vehicle->reg_plate_code,
        ];

        return $item;
    }
}
