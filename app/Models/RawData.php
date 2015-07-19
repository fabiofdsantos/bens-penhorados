<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RawData extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'raw_data';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'code';

    /**
     * Indicate if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
