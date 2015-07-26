<?php

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
    protected $table = 'vehicles_colors';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
