<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Models\Attributes\CorporateShare;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the corporate model class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 *
 * @property int         $nif
 * @property string      $name
 * @property string      $address
 * @property string      $postal_code
 * @property string      $city
 * @property string      $cae
 * @property string      $activity
 * @property string      $nature
 * @property float       $capital
 * @property string      $capital_currency
 * @property bool        $is_active
 * @property string|null $email
 * @property int|null    $phone
 * @property string|null $website
 * @property int|null    $fax
 */
class Corporate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'corporates';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'nif';

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
}
