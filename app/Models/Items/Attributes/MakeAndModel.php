<?php

namespace App\Models\Items\Attributes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MakeAndModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vehicles_makes_models';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'code';

    /**
     * Scope a query to only include makes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMakes(Builder $query)
    {
        return $query->where('parent_id', null)->get();
    }

    /**
     * Scope a query to only include models of a given make.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeModels(Builder $query, $make_id)
    {
        return $query->where('parent_id', $make_id)->get();
    }
}
