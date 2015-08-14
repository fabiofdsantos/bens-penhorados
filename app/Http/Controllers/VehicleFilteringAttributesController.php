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
            'districts'      => $this->getDistricts(),
            'municipalities' => $this->getMunicipalities($districtId),
            'purchaseTypes'  => $this->getPurchaseTypes(),
            'categories'     => $this->getCategories(),
            'colors'         => $this->getColors(),
            'fuels'          => $this->getFuels(),
            'makes'          => $this->getMakes(),
            'models'         => $this->getModels($makeId),
            'types'          => $this->getTypes(),
        ];

        return $attributes;
    }

    /**
     * Get districts.
     *
     * @return array|null
     */
    public function getDistricts()
    {
        return District::assignedToVehicles()->lists('name', 'id') ?: null;
    }

    /**
     * Get municipalities.
     *
     * @param int|null $districtId
     *
     * @return array|null
     */
    private function getMunicipalities($districtId)
    {
        if (isset($districtId)) {
            return Municipality::assignedToVehicles()->ofDistrict($districtId)->lists('name', 'id') ?: null;
        }
    }

    /**
     * Get purchase types.
     *
     * @return array|null
     */
    private function getPurchaseTypes()
    {
        return ItemPurchaseType::assignedToVehicles()->lists('name', 'id') ?: null;
    }

    /**
     * Get categories.
     *
     * @return array|null
     */
    private function getCategories()
    {
        return VehicleCategory::assigned()->lists('name', 'id') ?: null;
    }

    /**
     * Get colors.
     *
     * @return array|null
     */
    private function getColors()
    {
        return VehicleColor::assigned()->lists('name', 'id') ?: null;
    }

    /**
     * Get fuels.
     *
     * @return array|null
     */
    private function getFuels()
    {
        return VehicleFuel::assigned()->lists('name', 'id') ?: null;
    }

    /**
     * Get makes.
     *
     * @return array|null
     */
    private function getMakes()
    {
        return VehicleMake::assigned()->lists('name', 'id') ?: null;
    }

    /**
     * Get models of a given make.
     *
     * @param int|null $makeId [description]
     *
     * @return array|null
     */
    private function getModels($makeId)
    {
        if (isset($makeId)) {
            return VehicleModel::assigned()->ofMake($makeId)->lists('name', 'id') ?: null;
        }
    }

    /**
     * Get types.
     *
     * @return array|null
     */
    private function getTypes()
    {
        return VehicleType::assigned()->lists('name', 'id') ?: null;
    }
}
