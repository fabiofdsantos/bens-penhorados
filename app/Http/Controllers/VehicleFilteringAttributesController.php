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

use App\Models\Attributes\Generic\District;
use App\Models\Attributes\Generic\ItemPurchaseType;
use App\Models\Attributes\Generic\Municipality;
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
        $districtId = (int) $request->input('district') ?: null;

        $data = $this->getAttributes($makeId, $districtId);

        return response()->json($data, 200);
    }

    /**
     * Get filtering attributes.
     *
     * There are attributes related to each other. For example, municipalities
     * are shown if the district was also set.
     *
     * @param int|null $makeId
     * @param int|null $districtId
     *
     * @return array
     */
    public function getAttributes($makeId, $districtId)
    {
        $attributes = [
            'districts'      => District::assignedToVehicles()->lists('name', 'id') ?: null,
            'municipalities' => Municipality::assignedToVehicles()->ofDistrict($districtId)->lists('name', 'id') ?: null,
            'purchaseTypes'  => ItemPurchaseType::assignedToVehicles()->lists('name', 'id') ?: null,
            'categories'     => VehicleCategory::assigned()->lists('name', 'id') ?: null,
            'colors'         => VehicleColor::assigned()->lists('name', 'id') ?: null,
            'fuels'          => VehicleFuel::assigned()->lists('name', 'id') ?: null,
            'makes'          => VehicleMake::assigned()->lists('name', 'id') ?: null,
            'models'         => VehicleModel::assigned()->ofMake($makeId)->lists('name', 'id') ?: null,
            'types'          => VehicleType::assigned()->lists('name', 'id') ?: null,
            'colors'         => VehicleColor::assigned()->lists('name', 'id') ?: null,
            'fuels'          => VehicleFuel::assigned()->lists('name', 'id') ?: null,
        ];

        return $attributes;
    }
}
