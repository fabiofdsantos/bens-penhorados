<?php

namespace App\Http\Controllers;

use App\Models\Items\Item;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Show both latest and items ending soon.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $data['newItems'] = $this->getLatestItems(6);
        $data['endingSoon'] = $this->getItemsEndingSoon(6);

        return response()->json($data, 200);
    }

    /**
     * Get the latest items.
     *
     * @param int $howMany
     *
     * @return array
     */
    public function getLatestItems($howMany)
    {
        $results = Item::latest($howMany);

        if ($results->isEmpty()) {
            return [];
        }

        foreach ($results as $result) {
            $item = [
                'price' => $result->price,
                'image' => json_decode($result->images)[0],
            ];

            $items[] = $item;
        }

        return $items;
    }

    /**
     * Get the items ending soon.
     *
     * @param int $howMany
     *
     * @return array
     */
    public function getItemsEndingSoon($howMany)
    {
        $results = Item::endingSoon($howMany);

        if ($results->isEmpty()) {
            return [];
        }

        foreach ($results as $result) {
            $item = [
                'price'    => $result->price,
                'image'    => json_decode($result->images)[0],
                'timeleft' => $result->acceptance_dt->diffForHumans(Carbon::now(), true),
            ];

            $items[] = $item;
        }

        return $items;
    }
}
