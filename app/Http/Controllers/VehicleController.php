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

/**
 * This is the vehicle controller class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class VehicleController extends Controller
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
        $perPage = $request->input('limit') ?: 15;

        $data = $this->getVehicles($perPage);

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
     * Get vehicles with pagination.
     *
     * @param int $perPage
     *
     * @return array
     */
    public function getVehicles($perPage)
    {
        $vehicles = Vehicle::paginate($perPage);

        if ($vehicles->isEmpty()) {
            return [];
        }

        $data = [];
        $data['from'] = $vehicles->firstItem();
        $data['to'] = $vehicles->lastItem();
        $data['total'] = $vehicles->total();
        $data['limit'] = $vehicles->perPage();

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
     * Get a single vehicle.
     *
     * @param string $slug
     *
     * @return array
     */
    public function getSingleVehicle($slug)
    {
        $result = Item::withSlug($slug)->first();

        if (empty($result)) {
            return [];
        }

        $vehicle = [
                'images' => json_decode($result->images),
            ];

        return $vehicle;
    }
}
