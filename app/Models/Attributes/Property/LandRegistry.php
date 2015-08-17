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
}
