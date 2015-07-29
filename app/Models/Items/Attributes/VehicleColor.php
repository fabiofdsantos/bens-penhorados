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

use Illuminate\Database\Eloquent\Model;

/**
 * This is the vehicle's color model class.
 *
 * @property int $id
 * @property string $name
 * @property string $regex
 */
class VehicleColor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vehicle_colors';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
