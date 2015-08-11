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
}
