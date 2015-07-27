<?php

namespace App\Models\Items;

use App\Models\Items\Attributes\VehicleCategory;
use App\Models\Items\Attributes\VehicleColor;
use App\Models\Items\Attributes\VehicleFuel;
use App\Models\Items\Attributes\VehicleMake;
use App\Models\Items\Attributes\VehicleModel;
use App\Models\Items\Attributes\VehicleType;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the vehicle model class.
 *
 * @property string $code
 * @property int|null $year
 * @property bool|null $is_good_condition
 * @property int|null $make_id
 * @property int|null $model_id
 * @property int|null $color_id
 * @property int|null $fuel_id
 * @property int|null $category_id
 * @property int|null $type_id
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
    protected $primaryKey = 'code';

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
     * A vehicle belongs to a item.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'code', 'code');
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
}
