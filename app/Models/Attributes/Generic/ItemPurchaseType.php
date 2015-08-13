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
use App\Models\Items\Vehicle;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the item's purchase type model class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 *
 * @property int    $id
 * @property string $name
 * @property string $regex
 */
class ItemPurchaseType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item_purchase_types';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Scope a query to only include purchase types assigned at least
     * to one active vehicle.
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeAssignedToVehicles(Builder $query)
    {
        $ids = Item::ofType(Vehicle::class)->active()->lists('purchase_type_id');

        return $query->whereIn('id', $ids)->orderBy('name');
    }
}
