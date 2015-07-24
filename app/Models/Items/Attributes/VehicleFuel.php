<?php

namespace App\Models\Items\Attributes;

use Illuminate\Database\Eloquent\Model;

class VehicleFuel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vehicles_fuels';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
