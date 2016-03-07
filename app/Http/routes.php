<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$app->group([
    'namespace'  => 'App\Http\Controllers',
], function () use ($app) {
    // Homepage
    $app->get('/', ['uses' => 'HomeController@index']);

    // Get properties
    $app->get('imoveis', ['uses' => 'SearchController@properties']);
    $app->get('imoveis/{slug}', ['uses' => 'ItemController@propertyType']);

    // Get vehicles
    $app->get('veiculos', ['uses' => 'SearchController@vehicles']);
    $app->get('veiculos/{slug}', ['uses' => 'ItemController@vehicleType']);

    // Get other items
    $app->get('outros', ['uses' => 'SearchController@others']);
    $app->get('outros/{slug}', ['uses' => 'ItemController@otherType']);

    // Generate sitemap
    $app->get('sitemap.xml', function () {

        header('Content-type: text/xml');

        $xml = [];
        $xml[] = '<?xml version="1.0" encoding="UTF-8"?'.'>';
        $xml[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $xml[] = '  <url>';
        $xml[] = '    <loc>https://www.benspenhorados.pt</loc>';
        $xml[] = '    <lastmod>'.\Carbon\Carbon::today()->toW3cString().'</lastmod>';
        $xml[] = '    <changefreq>daily</changefreq>';
        $xml[] = '    <priority>0.8</priority>';
        $xml[] = '  </url>';

        $items = \App\Models\Items\Item::all();

        foreach ($items as $item) {
            $xml[] = '  <url>';
            $xml[] = '    <loc>https://www.benspenhorados.pt/'.$item->category->pluck('slug').'/'.$item->slug.'</loc>';
            $xml[] = '    <lastmod>'.\Carbon\Carbon::parse($item->updated_at)->toW3cString().'</lastmod>';
            $xml[] = '  </url>';
        }

        $xml[] = '</urlset>';

        return join("\n", $xml);
    });

    // Get static page
    $app->get('/{slug}', ['uses' => 'StaticPageController@load']);
});

/*
 * API - Homepage & single pages
 */
/*$app->group([
    'prefix'     => 'api/v1/',
    'middleware' => 'wantsJson',
    'namespace'  => 'App\Http\Controllers',
], function () use ($app) {

    // Homepage
    $app->get('home', ['uses' => 'HomeController@index']);

    // Get a single property
    $app->get('properties/{slug}', ['uses' => 'ItemController@propertyType']);

    // Get a single vehicle
    $app->get('vehicles/{slug}', ['uses' => 'ItemController@vehicleType']);

    // Get a single other item
    $app->get('others/{slug}', ['uses' => 'ItemController@otherType']);
});*/

/*
 * API - Search results
 */
 $app->group([
     'prefix'     => 'api/v1/',
     'namespace'  => 'App\Http\Controllers\Results',
 ], function () use ($app) {

    // Get properties
    $app->get('properties', ['uses' => 'PropertyResultsController@index']);

    // Get vehicles
    $app->get('vehicles', ['uses' => 'VehicleResultsController@index']);

    // Get other items
    $app->get('others', ['uses' => 'OtherResultsController@index']);
});

/*
 * API - Filtering attributes
 */
$app->group([
    'prefix'     => 'api/v1/attributes/',
    'middleware' => 'wantsJson',
    'namespace'  => 'App\Http\Controllers\FilteringAttributes',
], function () use ($app) {

    // Get filtering attributes for properties
    $app->get('property', [
        'uses' => 'PropertyFilteringAttrController@index',
    ]);

    // Get filtering attributes for vehicles
    $app->get('vehicle', [
        'uses' => 'VehicleFilteringAttrController@index',
    ]);

    // Get filtering attributes for other items
    $app->get('other', [
        'uses' => 'OtherFilteringAttrController@index',
    ]);
});

/*
 * API - Auth
 */
/*$app->group([
    'prefix'     => 'api/v1/auth/',
    'middleware' => 'wantsJson',
    'namespace'  => 'App\Http\Controllers\User',
], function () use ($app) {

    // Post a new user
    $app->post('register', [
        'uses' => 'AuthController@createUser',
    ]);

    // Post login credentials
    $app->post('login', [
        'uses' => 'AuthController@login',
    ]);

    // Check if a visitor is an authenticated user
    $app->get('check', [
        'uses' => 'AuthController@check',
    ]);

    // Logout an authenticated user
    $app->get('logout', [
        'uses' => 'AuthController@logout',
    ]);
});*/

/*
 * API - User & favorites
 */
/*$app->group([
    'prefix'     => 'api/v1/user/',
    'middleware' => ['wantsJson', 'auth'],
    'namespace'  => 'App\Http\Controllers\User',
], function () use ($app) {

    // Get user details
    $app->get('account', [
        'uses' => 'UserController@show',
    ]);

    // Post updated user details
    $app->post('account/edit', [
        'uses' => 'UserController@edit',
    ]);

    // Get favorites
    $app->get('favorites', [
        'uses' => 'FavoriteController@index',
    ]);

    // Add a new favorite
    $app->post('favorites/add', [
        'uses' => 'FavoriteController@add',
    ]);

    // Remove a favorite
    $app->post('favorites/remove', [
        'uses' => 'FavoriteController@remove',
    ]);

    // Remove all favorites
    $app->get('favorites/remove-all', [
        'uses' => 'FavoriteController@removeAll',
    ]);

    // Check if a given item was favorited
    $app->post('favorites/check', [
        'uses' => 'FavoriteController@check',
    ]);
});*/
