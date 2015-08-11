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

/**
 * This is the vehicle single page controller class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class VehicleSinglePageController extends Controller
{
    /**
     * Show a vehicle.
     *
     * @param string $slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show($slug)
    {
        $data = $this->getVehicle($slug);

        if (empty($data)) {
            return response()->json($data, 404);
        }

        return response()->json($data, 200);
    }

    /**
     * Get a vehicle.
     *
     * @param string $slug
     *
     * @return array
     */
    public function getVehicle($slug)
    {
        $generic = Item::withSlug($slug)->first();

        if (empty($generic)) {
            return [];
        }

        $vehicle = Vehicle::find($generic->itemable_id);
        $item = [
            'code'           => $generic->code,
            'taxOffice'      => $generic->tax_office,
            'title'          => $generic->title,
            'slug'           => $generic->slug,
            'price'          => $generic->price,
            'vat'            => $generic->vat,
            'status'         => $generic->status()->pluck('name'),
            'mode'           => $generic->purchaseType()->pluck('name'),
            'description'    => $generic->full_description,
            'images'         => json_decode($generic->images),
            'previewDtStart' => $generic->preview_dt_start->format(self::DATETIME_FORMAT),
            'previewDtEnd'   => $generic->preview_dt_end->format(self::DATETIME_FORMAT),
            'openingDt'      => $generic->opening_dt->format(self::DATETIME_FORMAT),
            'acceptanceDt'   => $generic->acceptance_dt->format(self::DATETIME_FORMAT),
            'year'           => $vehicle->year,
            'make'           => $vehicle->make()->pluck('name'),
            'model'          => $vehicle->model()->pluck('name'),
            'category'       => $vehicle->category()->pluck('name'),
            'type'           => $vehicle->type()->pluck('name'),
            'color'          => $vehicle->color()->pluck('name'),
            'fuel'           => $vehicle->fuel()->pluck('name'),
            'goodCondition'  => is_null($vehicle->is_good_condition) ? null : (bool) $vehicle->is_good_condition,
            'engDispl'       => $vehicle->engine_displacement,
            'regPlateCode'   => $vehicle->reg_plate_code,
        ];

        return $item;
    }
}
