<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vehicles';

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
     * Get vehicles with pagination.
     *
     * @param int $perPage
     *
     * @return array
     */
    public static function withPagination($perPage)
    {
        $results = Item::join('vehicles', 'vehicles.code', '=', 'items.code')
        ->select('items.price', 'items.images')
        ->paginate($perPage);

        $data = [];
        if (!$results->isEmpty()) {
            $data['from'] = $results->firstItem();
            $data['to'] = $results->lastItem();
            $data['total'] = $results->total();
            $data['limit'] = $results->perPage();

            foreach ($results as $result) {
                $item = new self();
                $item->price = $result->price;
                $item->image = json_decode($result->images)[0];

                $data['items'][] = $item;
            }
        }

        return $data;
    }
}
