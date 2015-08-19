<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Models\Items;

use App\Models\Attributes\Property\LandRegistry;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the property model class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 *
 * @property int          $id
 * @property bool         $location_on_desc
 * @property LandRegistry $landRegistry
 */
class Property extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'properties';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicate if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at'];

    /**
     * Get the corporate share's generic data.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function item()
    {
        return $this->morphOne(Item::class, 'itemable');
    }

    /**
     * An item must be associated with a land registry type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function landRegistry()
    {
        return $this->hasOne(LandRegistry::class, 'id', 'land_registry_id');
    }
}
