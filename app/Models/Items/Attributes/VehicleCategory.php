<?php

namespace App\Models\Items\Attributes;

use Illuminate\Database\Eloquent\Model;

class VehicleCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vehicles_categories';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
