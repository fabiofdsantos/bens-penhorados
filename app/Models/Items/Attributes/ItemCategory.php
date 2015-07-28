<?php

namespace App\Models\Items\Attributes;

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
}
