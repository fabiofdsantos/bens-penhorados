<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\LocationTrait;
use App\Models\Favorite;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller;

/**
 * This is the favorite controller class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class FavoriteController extends Controller
{
    use LocationTrait;

    /**
     * Get favorites of the currently logged in user.
     *
     * @return Response
     */
    public function index()
    {
        $favorites = Auth::user()->favorites()->paginate(5);

        $data = [];
        $data['from'] = $favorites->isEmpty() ? 0 : $favorites->firstItem();
        $data['to'] = $favorites->isEmpty() ? 0 : $favorites->lastItem();
        $data['total'] = $favorites->isEmpty() ? 0 : $favorites->total();
        $data['limit'] = $favorites->isEmpty() ? 0 : $favorites->perPage();

        $data['items'] = [];
        foreach ($favorites as $favorite) {
            $item = [
                'category'     => $favorite->item->category->slug,
                'title'        => $favorite->item->title,
                'slug'         => $favorite->item->slug,
                'price'        => $favorite->item->price,
                'image'        => json_decode($favorite->item->images) ? json_decode($favorite->item->images)[0] : null,
                'status'       => $favorite->item->status->name,
                'purchaseType' => $favorite->item->purchaseType->name,
                'location'     => self::getLocation($favorite->item),
            ];

            $data['items'][] = $item;
        }

        return response()->json($data, 200);
    }

    /**
     * Add the given item to user's favorites.
     *
     * @return Response|null
     */
    public function add(Request $request)
    {
        $attributes = [
            'user_id'   => Auth::user()->id,
            'item_code' => $request->code,
        ];

        Favorite::firstOrCreate($attributes);

        return response()->json([
            'success' => 'Added to favorites!',
        ], 200);
    }

    /**
     * Remove the given item from user's favorites.
     *
     * @param Request $request
     *
     * @return Response|null
     */
    public function remove(Request $request)
    {
        Auth::user()->favorites()->where('item_code', $request->code)->delete();

        return response()->json([
            'success' => 'Removed from favorites!',
        ], 200);
    }

    /**
     * Remove all favorites of the the currently logged in user.
     *
     * @return void
     */
    public function removeAll()
    {
        DB::table('user_favorites')->delete();
    }

    /**
     * Check if a given item is favorited by the currently logged in user.
     *
     * @param Request $request
     *
     * @return Response|null
     */
    public function check(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->favorites()->where('item_code', $request->code)->exists()) {
                return response()->json([
                    'success' => 'The item exists as a favorite.',
                ], 200);
            }
        }
    }
}
