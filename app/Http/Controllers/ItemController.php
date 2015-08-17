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
use Laravel\Lumen\Routing\Controller;

/**
 * This is the item controller class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class ItemController extends Controller
{
    use LocationTrait;

    const DATETIME_FORMAT = 'd-m-Y \à\s H:i';

    /**
     * Show a vehicle item.
     *
     * @param strind $slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function vehicleType($slug)
    {
        $data = self::getVehicleItemBySlug($slug);

        return self::buildResponse($data);
    }

    /**
     * Show an other item.
     *
     * @param string $slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function otherType($slug)
    {
        $data = self::getOtherItemBySlug($slug);

        return self::buildResponse($data);
    }

    /**
     * Build a json response with the given data.
     *
     * @param array $data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private static function buildResponse($data)
    {
        if (empty($data)) {
            return response()->json($data, 404);
        }

        return response()->json($data, 200);
    }

    /**
     * Get a vehicle with a given slug.
     *
     * @param string $slug
     *
     * @return array
     */
    private static function getVehicleItemBySlug($slug)
    {
        $generic = Item::withSlug($slug)->first();

        if (empty($generic)) {
            return [];
        }

        $vehicle = Vehicle::find($generic->itemable_id);
        $item = [
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
            'generic'        => self::getGenericAttributes($generic),
        ];

        return $item;
    }

    /**
     * Get an other item with a given slug.
     *
     * @param string $slug
     *
     * @return array
     */
    private static function getOtherItemBySlug($slug)
    {
        $generic = Item::withSlug($slug)->first();

        if (empty($generic)) {
            return [];
        }

        $item = [
            'generic' => self::getGenericAttributes($generic),
        ];

        return $item;
    }

    private static function getGenericAttributes($generic)
    {
        return [
            'code'           => $generic->code,
            'taxOffice'      => self::getTaxOfficeName($generic->taxOffice),
            'location'       => self::getLocation($generic),
            'title'          => $generic->title,
            'slug'           => $generic->slug,
            'price'          => [
                'value' => $generic->price,
                'vat'   => $generic->vat,
            ],
            'status'         => $generic->status()->pluck('name'),
            'purchaseType'   => $generic->purchaseType()->pluck('name'),
            'description'    => $generic->full_description,
            'images'         => json_decode($generic->images),
            'dates'          => [
                'previewDtStart' => $generic->preview_dt_start->format(self::DATETIME_FORMAT),
                'previewDtEnd'   => $generic->preview_dt_end->format(self::DATETIME_FORMAT),
                'openingDt'      => $generic->opening_dt->format(self::DATETIME_FORMAT),
                'acceptanceDt'   => $generic->acceptance_dt->format(self::DATETIME_FORMAT),
            ],
            'depositary'     => [
                'name'  => $generic->depositary_name,
                'phone' => $generic->depositary_phone,
                'email' => $generic->depositary_email,
            ],
            'mediator'       => [
                'name'  => $generic->mediator_name,
                'phone' => $generic->mediator_phone,
                'email' => $generic->mediator_email,
            ],
        ];
    }

    /**
     * Get the tax office name.
     *
     * @param \App\Models\Attributes\Generic\ItemTaxOffice $office
     *
     * @return string
     */
    private static function getTaxOfficeName($office)
    {
        $name = $office->code.' - ';
        $name .= $office->municipality->name;

        if ($office->number) {
            $name .= ' ('.$office->number.')';
        }

        return $name;
    }
}
