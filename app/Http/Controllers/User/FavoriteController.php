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

    public function remove(Request $request)
    {
        Auth::user()->favorites()->where('item_code', $request->code)->delete();

        return response()->json([
            'success' => 'Removed from favorites!',
        ], 200);
    }

    public function removeAll()
    {
        DB::table('user_favorites')->delete();
    }

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
