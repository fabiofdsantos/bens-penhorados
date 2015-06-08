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
}
