<?php

namespace App\Models\Items\Attributes;

use Illuminate\Database\Eloquent\Model;

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
