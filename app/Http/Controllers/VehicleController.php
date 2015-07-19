<?php

namespace App\Http\Controllers;

use App\Models\Items\Vehicle;
use Illuminate\Http\Request;

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

        $data = Vehicle::withPagination($perPage);

        return response()->json($data, 200);
    }

    /**
     * Show a single vehicle.
     *
     * @param string $code
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show($code)
    {
        $data = Vehicle::join('items', 'items.code', '=', 'vehicles.code')
            ->where('vehicles.code', '=', $code)->firstOrFail();

        $data->images = json_decode($data->images);

        return response()->json($data, 200);
    }
}
