<?php

namespace App\Models\Items\Attributes;

use Illuminate\Database\Eloquent\Model;

class MakeAndModel extends Model
{
    protected $table = 'vehicles_makes_models';
    protected $primaryKey = 'code';

    /**
     * Scope a query to only include makes.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMakes($query)
    {
        return $query->where('parent_id', null)->get();
    }

    /**
     * Scope a query to only include models of a given make.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeModels($query, $make_id)
    {
        return $query->where('parent_id', $make_id)->get();
    }
}
