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

use App\Models\Items\Attributes\VehicleCategory;
use App\Models\Items\Attributes\VehicleColor;
use App\Models\Items\Attributes\VehicleFuel;
use App\Models\Items\Attributes\VehicleMake;
use App\Models\Items\Attributes\VehicleModel;
use App\Models\Items\Attributes\VehicleType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the vehicle model class.
 *
 * @property int $id
 * @property int|null $year
 * @property bool|null $is_good_condition
 * @property Item $item
 * @property VehicleMake|null $make
 * @property VehicleModel|null $model
 * @property VehicleColor|null $color
 * @property VehicleFuel|null $fuel
 * @property VehicleCategory|null $category
 * @property VehicleType|null $type
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
      * @return Illuminate\Database\Eloquent\Relations\MorphOne
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
        return $this->hasOne(VehicleType::class, 'id', 'fuel_id');
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
}
