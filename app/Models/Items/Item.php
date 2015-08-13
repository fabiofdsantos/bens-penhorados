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

use App\Models\Attributes\Generic\District;
use App\Models\Attributes\Generic\ItemCategory;
use App\Models\Attributes\Generic\ItemPurchaseType;
use App\Models\Attributes\Generic\ItemStatus;
use App\Models\Attributes\Generic\ItemTaxOffice;
use App\Models\Attributes\Generic\Municipality;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * This is the item model class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 *
 * @property string           $code
 * @property ItemCategory     $category
 * @property ItemStatus       $status
 * @property ItemPurchaseType $purchaseType
 * @property ItemTaxOffice    $taxOffice
 * @property District         $district
 * @property Municipality     $municipality
 * @property string           $title
 * @property string           $slug
 * @property int              $year
 * @property float            $price
 * @property int|null         $vat
 * @property float|null       $lat
 * @property float|null       $lng
 * @property string           $images
 * @property string|null      $depositary_name
 * @property int|null         $depositary_phone
 * @property string|null      $depositary_email
 * @property string|null      $mediator_name
 * @property int|null         $mediator_phone
 * @property string|null      $mediator_email
 * @property Carbon           $preview_dt_start
 * @property Carbon           $preview_dt_end
 * @property Carbon           $acceptance_dt
 * @property Carbon           $opening_dt
 * @property Carbon           $updated_at
 * @property Carbon           $created_at
 */
class Item extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items';

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
     * Convert some columns to instances of Carbon.
     *
     * @return array
     */
    public function getDates()
    {
        return [
            'preview_dt_start',
            'preview_dt_end',
            'acceptance_dt',
            'opening_dt',
        ];
    }

    /**
     * Get all of the owning itemable models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function itemable()
    {
        return $this->morphTo();
    }

    /**
     * An item must have a category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne(ItemCategory::class, 'id', 'category_id');
    }

    /**
     * An item must have a status.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->hasOne(ItemStatus::class, 'id', 'status_id');
    }

    /**
     * An item must have a purchase type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function purchaseType()
    {
        return $this->hasOne(ItemPurchaseType::class, 'id', 'status_id');
    }

    /**
     * An item must be associated with a tax office.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function taxOffice()
    {
        return $this->hasOne(ItemTaxOffice::class, 'id', 'tax_office_id');
    }

    /**
     * An item should be associated with a district.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function district()
    {
        return $this->hasOne(District::class, 'id', 'district_id');
    }

    /**
     * An item should be associated with a municipality.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function municipality()
    {
        return $this->hasOne(Municipality::class, 'id', 'municipality_id');
    }

    /**
     * Scope a query to set polymorphic relation with this model.
     *
     * @param Builder $query
     * @param string  $code
     * @param Model   $model
     */
    public function scopeSetPolymorphicRelation(Builder $query, $code, $model)
    {
        return $query->where('code', $code)->update([
            'itemable_id'   => $model->getKey(),
            'itemable_type' => $model->getMorphClass(),
        ]);
    }

    /**
     * Scope a query to only include the latest items.
     *
     * @param Builder $query
     * @param int     $howMany
     *
     * @return Builder
     */
    public function scopeLatest(Builder $query, $howMany)
    {
        return $query->orderBy('created_at', 'desc')->take($howMany);
    }

    /**
     * Scope a query to only include the items ending soon.
     *
     * @param Builder $query
     * @param int     $howMany
     *
     * @return Builder
     */
    public function scopeEndingSoon(Builder $query, $howMany)
    {
        return $query->orderBy('acceptance_dt', 'asc')->take($howMany);
    }

    /**
     * Scope a query to only include the item with a given slug.
     *
     * @param Builder $query
     * @param string  $slug
     *
     * @return Builder
     */
    public function scopeWithSlug(Builder $query, $slug)
    {
        return $query->where('slug', $slug);
    }

    /**
     * Scope a query to only include active items.
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeActive(Builder $query)
    {
        return $query->where('acceptance_dt', '>', Carbon::now());
    }

    /**
     * Scope a query to only include items of a given type.
     *
     * @param Builder $query
     * @param string  $type
     *
     * @return Builder
     */
    public function scopeOfType(Builder $query, $type)
    {
        return $query->where('itemable_type', $type);
    }

    /**
     * Set the item's title and slug.
     *
     * @param string $value
     *
     * @return string
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (Str::contains($value, $this->attributes['code'])) {
            $this->attributes['slug'] = Str::slug($value);
        } else {
            $newValue = $this->attributes['code'];
            $newValue .= "-$value";

            $this->attributes['slug'] = Str::slug($newValue);
        }
    }
}
