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

    // Get a property
    $app->get('imoveis/{slug}', ['uses' => 'ItemController@propertyType']);

    // Get a vehicle
    $app->get('veiculos/{slug}', ['uses' => 'ItemController@vehicleType']);

    // Get other item
    $app->get('outros/{slug}', ['uses' => 'ItemController@otherType']);

    // Get generic page
    $app->get('/{slug}', ['uses' => 'GenericPageController@load']);
});

/*
 * API - Homepage & single pages
 */
$app->group([
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
});

/*
 * API - Search results
 */
 $app->group([
     'prefix'     => 'api/v1/',
     'middleware' => 'wantsJson',
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
$app->group([
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
});

/*
 * API - User & favorites
 */
$app->group([
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
});
