<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Http\Controllers\FilteringAttributes;

use App\Models\Attributes\Vehicle\VehicleCategory;
use App\Models\Attributes\Vehicle\VehicleColor;
use App\Models\Attributes\Vehicle\VehicleFuel;
use App\Models\Attributes\Vehicle\VehicleMake;
use App\Models\Attributes\Vehicle\VehicleModel;
use App\Models\Attributes\Vehicle\VehicleType;
use App\Models\Items\Vehicle;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

/**
 * This is the vehicle filtering attributes controller class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class VehicleFilteringAttrController extends Controller
{
    use GenericFilteringAttributesTrait;

    public function __construct()
    {
        self::$itemType = Vehicle::class;
    }

    /**
     * Show a list of filtering attributes for vehicles.
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $makeId = (int) $request->input('make') ?: null;
        $districtId = (int) $request->input('district') ?: null;

        $data = [
            'generic' => self::getGenericFilteringAttr($districtId),
            'vehicle' => self::getVehicleFilteringAttr($makeId),
        ];

        return response()->json($data, 200);
    }

    /**
     * Get vehicle filtering attributes.
     *
     * There are attributes related to each other. For example, models
     * are shown if the make was also set.
     *
     * @param int|null $makeId
     *
     * @return array
     */
    private static function getVehicleFilteringAttr($makeId)
    {
        $vehicleAttr = [
            'categories'     => self::getCategories(),
            'colors'         => self::getColors(),
            'fuels'          => self::getFuels(),
            'makes'          => self::getMakes(),
            'models'         => self::getModels($makeId),
            'types'          => self::getTypes(),
        ];

        return $vehicleAttr;
    }

    /**
     * Get categories.
     *
     * @return array|null
     */
    private static function getCategories()
    {
        return VehicleCategory::assigned()->lists('name', 'id') ?: null;
    }

    /**
     * Get colors.
     *
     * @return array|null
     */
    private static function getColors()
    {
        return VehicleColor::assigned()->lists('name', 'id') ?: null;
    }

    /**
     * Get fuels.
     *
     * @return array|null
     */
    private static function getFuels()
    {
        return VehicleFuel::assigned()->lists('name', 'id') ?: null;
    }

    /**
     * Get makes.
     *
     * @return array|null
     */
    private static function getMakes()
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
    private static function getModels($makeId)
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
    private static function getTypes()
    {
        return VehicleType::assigned()->lists('name', 'id') ?: null;
    }
}
