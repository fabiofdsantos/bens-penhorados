<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Models\Attributes\Generic;

use App\Models\Items\Item;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the municipality model class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 *
 * @property int      $id
 * @property string   $name
 * @property string   $regex
 * @property District $district
 */
class Municipality extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pt_municipalities';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * A municipality belongs to a district.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Scope a query to only include municipalities of a given district.
     *
     * @param Builder $query
     * @param int     $districtId
     *
     * @return Builder
     */
    public function scopeOfDistrict(Builder $query, $districtId)
    {
        return $query->where('district_id', $districtId);
    }

    /**
     * Scope a query to only include municipalities assigned at least
     * to one active item of a given type.
     *
     * @param Builder $query
     * @param string  $itemType
     *
     * @return Builder
     */
    public function scopeAssignedTo(Builder $query, $itemType)
    {
        $ids = Item::ofType($itemType)->active()->lists('municipality_id');

        return $query->whereIn('id', $ids)->orderBy('name');
    }

    /**
     * Scope a query to only include municipalities assigned at least
     * to one active uncatalogued item.
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeAssignedToUncataloguedItems(Builder $query)
    {
        $ids = Item::onlyUncatalogued()->active()->lists('municipality_id');

        return $query->whereIn('id', $ids)->orderBy('name');
    }
}
