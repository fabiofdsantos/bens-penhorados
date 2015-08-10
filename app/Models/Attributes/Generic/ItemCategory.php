<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Models\Items\Attributes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the item's category model class.
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $code
 */
class ItemCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item_categories';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Scope a query to only include the categories with the given codes.
     *
     * @param Builder $query
     * @param array   $codes
     *
     * @return Builder
     */
    public function scopeWhereCodeIn(Builder $query, $codes)
    {
        return $query->whereIn('code', $codes);
    }
}
