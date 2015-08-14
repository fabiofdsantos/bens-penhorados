<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Models\Attributes\Generic;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the tax office model class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 *
 * @property int          $id
 * @property string       $code
 * @property int          $number
 * @property Municipality $municipality
 */
class ItemTaxOffice extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item_tax_offices';

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * A tax office belongs to a municipality.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function municipality()
    {
        return $this->hasOne(Municipality::class, 'id', 'municipality_id');
    }
}
