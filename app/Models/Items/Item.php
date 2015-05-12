<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'code';

    public function getDates()
    {
        return ['acceptance_dt'];
    }

    public static function latest()
    {
        $results = self::select('price', 'images')->orderBy('created_at', 'desc')->take(6)->get();

        if ($results->isEmpty()) {
            return;
        }

        foreach ($results as $result) {
            $item = new self();
            $item->price = $result->price;
            $item->image = json_decode($result->images)[0];
            $items[] = $item;
        }

        return $items;
    }

    public static function endingSoon()
    {
        $results = self::select('price', 'images', 'acceptance_dt')->orderBy('acceptance_dt', 'asc')->take(6)->get();

        if ($results->isEmpty()) {
            return;
        }

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
