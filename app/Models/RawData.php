<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the raw data model class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 *
 * @property string      $code
 * @property string      $hash
 * @property string|null $lat
 * @property string|null $lng
 * @property int         $category_id
 * @property bool        $extracted
 */
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

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at'];

    /**
     * Scope a query to only include the raw data of certain categories.
     *
     * @param Builder $query
     * @param array   $categories
     *
     * @return Builder
     */
    public function scopeWhereCategoryIn(Builder $query, $categories)
    {
        return $query->whereIn('category_id', $categories);
    }

    /**
     * Scope a query to only include the unextracted raw data.
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeUnextracted(Builder $query)
    {
        return $query->where('extracted', false);
    }

    /**
     * Scope a query to only include the extracted raw data.
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeExtracted(Builder $query)
    {
        return $query->where('extracted', true);
    }
}
