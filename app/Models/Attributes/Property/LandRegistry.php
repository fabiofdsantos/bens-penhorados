<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Models\Attributes\Property;

use App\Models\Items\Property;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the land registry model class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 *
 * @property int    $id
 * @property string $name
 * @property string $regex
 */
class LandRegistry extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'property_land_registry';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Scope a query to only include land registry types assigned at least
     * to one active property.
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeAssigned(Builder $query)
    {
        $ids = Property::active()->distinct()->lists('land_registry_id');

        return $query->whereIn('id', $ids)->orderBy('name');
    }
}
