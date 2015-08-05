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

use App\Models\Items\Attributes\Corporate;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the corporate share model class.
 *
 * @property int $id
 * @property Item $item
 * @property Corporate $corporate
 */
class CorporateShare extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'corporate_share';

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
     * A corporate share should have a corporate.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function corporate()
    {
        return $this->hasOne(Corporate::class, 'nif', 'corporate_nif');
    }
}
