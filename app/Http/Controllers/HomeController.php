<?php

namespace App\Http\Controllers;

use App\Models\Items\Item;

class HomeController extends Controller
{
    public function index()
    {
        $data['newItems'] = Item::latest();
        $data['endingSoon'] = Item::endingSoon();

        return response()->json($data, 200);
    }
}
