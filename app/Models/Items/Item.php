<?php

namespace App\Models\Items;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
     * Get latest items.
     *
     * @return array
     */
    public static function latest()
    {
        $results = self::select('price', 'images')->orderBy('created_at', 'desc')->take(6)->get();

        $items = [];

        foreach ($results as $result) {
            $item = new self();
            $item->price = $result->price;
            $item->image = json_decode($result->images)[0];

            $items[] = $item;
        }

        return $items;
    }

    /**
     * Get items ending soon.
     *
     * @return array
     */
    public static function endingSoon()
    {
        $results = self::select('price', 'images', 'acceptance_dt')->orderBy('acceptance_dt', 'asc')->take(6)->get();

        $items = [];

        foreach ($results as $result) {
            $item = new self();
            $item->price = $result->price;
            $item->image = json_decode($result->images)[0];
            $item->timeleft = Carbon::now()->diffForHumans($result->acceptance_dt, true);

            $items[] = $item;
        }

        return $items;
    }
}
