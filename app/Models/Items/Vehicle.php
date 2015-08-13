<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Models\Items;

use App\Models\Attributes\Vehicle\VehicleCategory;
use App\Models\Attributes\Vehicle\VehicleColor;
use App\Models\Attributes\Vehicle\VehicleFuel;
use App\Models\Attributes\Vehicle\VehicleMake;
use App\Models\Attributes\Vehicle\VehicleModel;
use App\Models\Attributes\Vehicle\VehicleType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the vehicle model class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 *
 * @property int                  $id
 * @property int|null             $year
 * @property bool|null            $is_good_condition
 * @property Item                 $item
 * @property VehicleMake|null     $make
 * @property VehicleModel|null    $model
 * @property VehicleColor|null    $color
 * @property VehicleFuel|null     $fuel
 * @property VehicleCategory|null $category
 * @property VehicleType|null     $type
 */
class Vehicle extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vehicles';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicate if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at'];

    /**
     * Get the vehicle's generic data.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function item()
    {
        return $this->morphOne(Item::class, 'itemable');
    }

    /**
     * A vehicle can have one make.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function make()
    {
        return $this->hasOne(VehicleMake::class, 'id', 'make_id');
    }

    /**
     * A vehicle can have one model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function model()
    {
        return $this->hasOne(VehicleModel::class, 'id', 'model_id');
    }

    /**
     * A vehicle can have one color.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function color()
    {
        return $this->hasOne(VehicleColor::class, 'id', 'color_id');
    }

    /**
     * A vehicle can have one fuel type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fuel()
    {
        return $this->hasOne(VehicleFuel::class, 'id', 'fuel_id');
    }

    /**
     * A vehicle can have one category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne(VehicleCategory::class, 'id', 'category_id');
    }

    /**
     * A vehicle can have one type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne(VehicleType::class, 'id', 'type_id');
    }

    /**
     * Scope a query to only include active items (vehicles).
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeActive(Builder $query)
    {
        $ids = Item::where('itemable_type', self::class)
                ->where('acceptance_dt', '>', Carbon::now())
                ->lists('itemable_id');

        return $query->whereIn('id', $ids);
    }

    /**
     * Scope a query to only include items of a specific make.
     *
     * @param Builder $query
     * @param int     $makeId
     *
     * @return Builder
     */
    public function scopeWhereMakeIs(Builder $query, $makeId)
    {
        return $query->where('make_id', $makeId);
    }

    /**
     * Scope a query to only include items of a specific model.
     *
     * @param Builder $query
     * @param int     $modelId
     *
     * @return Builder
     */
    public function scopeWhereModelIs(Builder $query, $modelId)
    {
        return $query->where('model_id', $modelId);
    }

    /**
     * Scope a query to only include items of a specific color.
     *
     * @param Builder $query
     * @param int     $colorId
     *
     * @return Builder
     */
    public function scopeWhereColorIs(Builder $query, $colorId)
    {
        return $query->where('color_id', $colorId);
    }

    /**
     * Scope a query to only include items of a specific fuel type.
     *
     * @param Builder $query
     * @param int     $fuelId
     *
     * @return Builder
     */
    public function scopeWhereFuelIs(Builder $query, $fuelId)
    {
        return $query->where('fuel_id', $fuelId);
    }

    /**
     * Scope a query to only include items of a specific category.
     *
     * @param Builder $query
     * @param int     $categoryId
     *
     * @return Builder
     */
    public function scopeWhereCategoryIs(Builder $query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    /**
     * Scope a query to only include items of a specific type.
     *
     * @param Builder $query
     * @param int     $typeId
     *
     * @return Builder
     */
    public function scopeWhereTypeIs(Builder $query, $typeId)
    {
        return $query->where('type_id', $typeId);
    }

    /**
     * Scope a query to only include items of a specific district.
     *
     * @param Builder $query
     * @param int     $districtId
     *
     * @return Builder
     */
    public function scopeOfDistrict(Builder $query, $districtId)
    {
        $ids = Item::where('itemable_type', self::class)
                ->where('district_id', '=', $districtId)
                ->lists('itemable_id');

        return $query->whereIn('id', $ids);
    }

    /**
     * Scope a query to only include items of a specific municipality.
     *
     * @param Builder $query
     * @param int     $municipalityId
     *
     * @return Builder
     */
    public function scopeOfMunicipality(Builder $query, $municipalityId)
    {
        $ids = Item::where('itemable_type', self::class)
                ->where('municipality_id', '=', $municipalityId)
                ->lists('itemable_id');

        return $query->whereIn('id', $ids);
    }
}
