<?php

namespace App\Models\Items\Attributes;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'vehicles_colors';
    protected $primaryKey = 'code';
}
