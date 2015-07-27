<?php

namespace App\Models\Items;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * This is the item model class.
 *
 * @property string $code
 * @property string $title
 * @property string $slug
 * @property int $tax_office
 * @property int $year
 * @property string $status
 * @property string $mode
 * @property float $price
 * @property int|null $vat
 * @property float|null $lat
 * @property float|null $lng
 * @property string $images
 * @property string|null $depositary_name
 * @property int|null $depositary_phone
 * @property string|null $depositary_email
 * @property string|null $mediator_name
 * @property int|null $mediator_phone
 * @property string|null $mediator_email
 * @property Carbon $preview_dt_start
 * @property Carbon $preview_dt_end
 * @property Carbon $acceptance_dt
 * @property Carbon $opening_dt
 * @property Carbon $updated_at
 * @property Carbon $created_at
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
     * Convert some columns to instances of Carbon.
     *
     * @return array
     */
    public function getDates()
    {
        return ['preview_dt_start', 'preview_dt_end', 'acceptance_dt', 'opening_dt'];
    }

    /**
     * A item can be also a vehicle vehicle.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vehicle()
    {
        return $this->hasOne(Vehicle::class, 'code', 'code');
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
        return $query->orderBy('created_at', 'desc')->take($howMany)->get();
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
        return $query->orderBy('acceptance_dt', 'asc')->take($howMany)->get();
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
        return $query->where('slug', $slug)->first();
    }

    /**
     * Set the items's slug.
     *
     * @param string $value
     *
     * @return string
     */
    public function setSlugAttribute($value)
    {
        if (Str::contains($value, $this->attributes['code'])) {
            $this->attributes['slug'] = Str::slug($value);
        } else {
            $newValue = $this->attributes['code'];
            $newValue .= "-$value";

            $this->attributes['slug'] = Str::slug($newValue);
        }
    }
}
