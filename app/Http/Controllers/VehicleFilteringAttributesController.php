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

use App\Models\Attributes\Vehicle\VehicleCategory;
use App\Models\Attributes\Vehicle\VehicleColor;
use App\Models\Attributes\Vehicle\VehicleFuel;
use App\Models\Attributes\Vehicle\VehicleMake;
use App\Models\Attributes\Vehicle\VehicleModel;
use App\Models\Attributes\Vehicle\VehicleType;
use Illuminate\Http\Request;

/**
 * This is the vehicle filtering attributes controller class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class VehicleFilteringAttributesController extends Controller
{
    /**
     * Show a list of filtering attributes.
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $makeId = (int) $request->input('make') ?: null;
        $data = $this->getAttributes($makeId);

        return response()->json($data, 200);
    }

    /**
     * Get filtering attributes.
     *
     * @param int|null $makeId
     *
     * @return array
     */
    public function getAttributes($makeId)
    {
        $attributes = [
            'categories' => VehicleCategory::assigned()->lists('name', 'id'),
            'colors'     => VehicleColor::assigned()->lists('name', 'id'),
            'fuels'      => VehicleFuel::assigned()->lists('name', 'id'),
            'makes'      => VehicleMake::assigned()->lists('name', 'id'),
            'models'     => VehicleModel::assigned()->whereMakeId($makeId)->lists('name', 'id') ?: null,
            'types'      => VehicleType::assigned()->lists('name', 'id'),
        ];

        return $attributes;
    }
}
