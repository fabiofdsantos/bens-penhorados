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

use App\Models\Attributes\Property\LandRegistry;
use App\Models\Items\Property;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

/**
 * This is the property filtering attributes controller class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class PropertyFilteringAttrController extends Controller
{
    use GenericFilteringAttributesTrait;

    public function __construct()
    {
        self::$itemType = Property::class;
    }

    /**
     * Show a list of filtering attributes for properties.
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $districtId = (int) $request->input('district') ?: null;

        $data = [
            'generic'  => self::getGenericFilteringAttr($districtId),
            'property' => self::getPropertyFilteringAttr(),
        ];

        return response()->json($data, 200);
    }

    /**
     * Get property filtering attributes.
     *
     * @return array
     */
    private static function getPropertyFilteringAttr()
    {
        $propertyAttr = [
            'landRegistryTypes' => self::getLandRegistryTypes(),
        ];

        return $propertyAttr;
    }

    /**
     * Get land registry types.
     *
     * @return array|null
     */
    private static function getLandRegistryTypes()
    {
        return LandRegistry::assigned()->lists('name', 'id') ?: null;
    }
}
