<?php

namespace App\Http\Controllers;

use App\Models\Items\Item;
use App\Models\Items\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Show a list of vehicles.
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('limit') ?: 15;

        $data = $this->getVehicles($perPage);

        return response()->json($data, 200);
    }

    /**
     * Show a single vehicle.
     *
     * @param string $slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show($slug)
    {
        $data = $this->getSingleVehicle($slug);

        if (empty($data)) {
            return response()->json($data, 404);
        }

        return response()->json($data, 200);
    }

     /**
      * Get vehicles with pagination.
      *
      * @param int $perPage
      *
      * @return array
      */
     public function getVehicles($perPage)
     {
         $results = Item::paginate($perPage);

         if ($results->isEmpty()) {
             return [];
         }

         $data['from'] = $results->firstItem();
         $data['to'] = $results->lastItem();
         $data['total'] = $results->total();
         $data['limit'] = $results->perPage();

         foreach ($results as $result) {
             $item = [
                    'title' => $result->title,
                    'slug'  => $result->slug,
                    'price' => $result->price,
                    'image' => json_decode($result->images)[0],
                    'make'  => $result->vehicle->make()->pluck('name'),
                    'model' => $result->vehicle->model()->pluck('name'),
                    'year'  => $result->vehicle->year,
                    'fuel'  => $result->vehicle->fuel()->pluck('name'),
                ];

             $data['items'][] = $item;
         }

         return $data;
     }

     /**
      * Get a single vehicle.
      *
      * @param  string $slug
      *
      * @return array
      */
     public function getSingleVehicle($slug)
     {
         $result = Item::withSlug($slug)->first();

         if (empty($result)) {
             return [];
         }

         $vehicle = [
             'images' => json_decode($result->images),
         ];

         return $vehicle;
     }
}
