<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items\Vehicle;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('limit') ?: 15;

        $data = Vehicle::paginated($limit);

        return response()->json($data, 200);
    }

    public function show($code)
    {
        $data = Vehicle::join('items', 'items.code', '=', 'vehicles.code')
        ->where('vehicles.code', '=', $code)->firstOrFail();

        $data->images = json_decode($data->images);

        return response()->json($data, 200);
    }
}
