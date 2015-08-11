<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Models\Attributes\Vehicle;

use App\Models\Items\Vehicle;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the vehicle's category model class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 *
 * @property int    $id
 * @property string $name
 * @property string $regex
 */
class VehicleCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vehicle_categories';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Scope a query to only include categories assigned at least to one vehicle.
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeAssigned(Builder $query)
    {
        $categories = Vehicle::distinct()->lists('category_id');

        return $query->whereIn('id', $categories)->orderBy('name');
    }
}
