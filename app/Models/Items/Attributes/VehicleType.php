<?php

namespace App\Models\Items\Attributes;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the vehicle's type model class.
 *
 * @property int $id
 * @property string $name
 * @property string $regex
 */
class VehicleType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vehicles_types';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
