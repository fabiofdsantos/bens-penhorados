<?php

namespace App\Models\Items\Attributes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vehicles_models';

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
        return $query->where('make_id', $make_id)->get();
    }
}
