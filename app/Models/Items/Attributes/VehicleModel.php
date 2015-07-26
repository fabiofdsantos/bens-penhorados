<?php

namespace App\Models\Items\Attributes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the vehicle's model model class.
 *
 * @property int $id
 * @property string $name
 * @property string $regex
 * @property int $make_id
 */
class VehicleModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vehicle_models';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Scope a query to only include models of a given make.
     *
     * @param Builder $query
     * @param int     $makeId
     *
     * @return Builder
     */
    public function scopeOfMake(Builder $query, $makeId)
    {
        return $query->where('make_id', $makeId)->get();
    }

    /**
     * A model belongs to a make.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function make()
    {
        return $this->belongsTo(VehicleMake::class);
    }
}
