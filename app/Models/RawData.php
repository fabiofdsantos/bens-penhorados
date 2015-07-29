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

use Illuminate\Database\Eloquent\Model;

/**
 * This is the raw data model class.
 *
 * @property string $code
 * @property string $hash
 * @property string|null $lat
 * @property string|null $lng
 * @property int $category_id
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
}
