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
 * This is the district model class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 *
 * @property int    $id
 * @property string $name
 * @property string $code
 * @property string $regex
 */
class District extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pt_districts';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Scope a query to only include districts assigned at least to
     * one active item of a given type.
     *
     * @param Builder $query
     * @param string  $itemType
     *
     * @return Builder
     */
    public function scopeAssignedTo(Builder $query, $itemType)
    {
        $districts = Item::ofType($itemType)->active()->lists('district_id');

        return $query->whereIn('id', $districts)->orderBy('name');
    }
}
