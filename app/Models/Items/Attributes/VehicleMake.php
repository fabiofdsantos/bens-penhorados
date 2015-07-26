<?php

namespace App\Models\Items\Attributes;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the vehicle's make model class.
 *
 * @property int $id
 * @property string $name
 * @property string $regex
 */
class VehicleMake extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vehicle_makes';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
