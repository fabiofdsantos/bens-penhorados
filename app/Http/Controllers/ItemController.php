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

use App\Models\Attributes\Generic\ItemStatus;
use App\Models\Items\Item;
use App\Models\Items\Property;
use App\Models\Items\Vehicle;
use Carbon\Carbon;
use Laravel\Lumen\Routing\Controller;

/**
 * This is the item controller class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class ItemController extends Controller
{
    const DATETIME_FORMAT = 'd-m-Y \à\s H:i';

    /**
     * Show a property item.
     *
     * @param strind $slug
     */
    public function propertyType($slug)
    {
        $data = self::getPropertyItemBySlug($slug);

        if (empty($data)) {
            abort(404);
        }

        return view('properties.show', $data);
    }

    /**
     * Show a vehicle item.
     *
     * @param strind $slug
     */
    public function vehicleType($slug)
    {
        $data = self::getVehicleItemBySlug($slug);

        if (empty($data)) {
            abort(404);
        }

        return view('vehicles.show', $data);
    }

    /**
     * Show an other item.
     *
     * @param string $slug
     */
    public function otherType($slug)
    {
        $data = self::getOtherItemBySlug($slug);

        if (empty($data)) {
            abort(404);
        }

        return view('others.show', $data);
    }

    /**
     * Get a property with a given slug.
     *
     * @param string $slug
     *
     * @return array
     */
    private static function getPropertyItemBySlug($slug)
    {
        $generic = Item::withSlug($slug)->first();

        if (empty($generic) || $generic->itemable_type != Property::class) {
            return [];
        }

        $property = Property::find($generic->itemable_id);

        $item = [
            'locationOnDesc'  => ($property->location_on_desc == false) ? null : true,
            'landRegistry'    => $property->landRegistry()->pluck('name'),
            'typology'        => $property->typology,
            'generic'         => self::getGenericAttributes($generic),
            'seoTitle'        => $generic->seo_title,
            'metaDescription' => $generic->meta_description,
        ];

        return $item;
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

        if (empty($generic) || $generic->itemable_type != Vehicle::class) {
            return [];
        }

        $vehicle = Vehicle::find($generic->itemable_id);

        $item = [
            'year'            => $vehicle->year,
            'make'            => $vehicle->make()->pluck('name'),
            'model'           => $vehicle->model()->pluck('name'),
            'category'        => $vehicle->category()->pluck('name'),
            'type'            => $vehicle->type()->pluck('name'),
            'color'           => $vehicle->color()->pluck('name'),
            'fuel'            => $vehicle->fuel()->pluck('name'),
            'goodCondition'   => is_null($vehicle->is_good_condition) ? null : (bool) $vehicle->is_good_condition,
            'engDispl'        => $vehicle->engine_displacement,
            'regPlateCode'    => $vehicle->reg_plate_code,
            'generic'         => self::getGenericAttributes($generic),
            'seoTitle'        => $generic->seo_title,
            'metaDescription' => $generic->meta_description,
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

        if (empty($generic) || !$generic->is_other_type) {
            return [];
        }

        $item = [
            'generic'  => self::getGenericAttributes($generic),
            'seoTitle' => $generic->seo_title,
        ];

        return $item;
    }

    /**
     * Get generic items.
     *
     * @param \Illuminate\Database\Eloquent\Model $generic
     *
     * @return array
     */
    private static function getGenericAttributes($generic)
    {
        self::checkIfIsInactive($generic);

        $extraAttr = explode('.', $generic->code);

        return [
            'extId'       => $extraAttr[2],
            'taxOfficeId' => $extraAttr[0],
            'year'        => $generic->year,
            'code'        => $generic->code,
            'taxOffice'   => self::getTaxOfficeName($generic->taxOffice),
            'location'    => "$generic->municipality, $generic->district",
            'title'       => $generic->title,
            'slug'        => $generic->slug,
            'price'       => [
                'value' => $generic->price,
                'vat'   => $generic->vat,
            ],
            'status'       => $generic->status()->pluck('name'),
            'purchaseType' => $generic->purchaseType()->pluck('name'),
            'description'  => $generic->full_description,
            'images'       => json_decode($generic->images),
            'dates'        => [
                'previewDtStart' => $generic->preview_dt_start->format(self::DATETIME_FORMAT),
                'previewDtEnd'   => $generic->preview_dt_end->format(self::DATETIME_FORMAT),
                'openingDt'      => $generic->opening_dt->format(self::DATETIME_FORMAT),
                'acceptanceDt'   => $generic->acceptance_dt->format(self::DATETIME_FORMAT),
            ],
            'depositary' => [
                'name'  => $generic->depositary_name,
                'phone' => $generic->depositary_phone,
                'email' => $generic->depositary_email,
            ],
            'mediator' => [
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

    /**
     * Check if a given item is inactive. If true, update it.
     *
     * @param \Illuminate\Database\Eloquent\Model $generic
     */
    private static function checkIfIsInactive($generic)
    {
        if ($generic->acceptance_dt < Carbon::now()) {
            $finishStatus = ItemStatus::where('name', 'Finalizado')->pluck('id');
            $generic->update(['status_id' => $finishStatus]);
        }
    }
}
