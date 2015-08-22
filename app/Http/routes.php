<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$app->get('/', function () {
    return view('index');
});

$app->group([
    'prefix'     => 'api/v1/',
    'middleware' => 'wantsJson',
    'namespace'  => 'App\Http\Controllers',
], function () use ($app) {

    $app->get('home', ['uses' => 'HomeController@index']);

    /* Properties */
    $app->get('properties/{slug}', ['uses' => 'ItemController@propertyType']);

    /* Vehicles */
    $app->get('vehicles/{slug}', ['uses' => 'ItemController@vehicleType']);

    /* Others */
    $app->get('others/{slug}', ['uses' => 'ItemController@otherType']);
});

/*
 * Results
 */
 $app->group([
     'prefix'     => 'api/v1/',
     'middleware' => 'wantsJson',
     'namespace'  => 'App\Http\Controllers\Results',
 ], function () use ($app) {

    /* Properties */
    $app->get('properties', ['uses' => 'PropertyResultsController@index']);

    /* Vehicles */
    $app->get('vehicles', ['uses' => 'VehicleResultsController@index']);

    /* Others */
    $app->get('others', ['uses' => 'OtherResultsController@index']);
});

/*
 * Filtering attributes
 */
$app->group([
    'prefix'     => 'api/v1/',
    'middleware' => 'wantsJson',
    'namespace'  => 'App\Http\Controllers\FilteringAttributes',
], function () use ($app) {

    /* Properties */
    $app->get('attributes/property', [
        'uses' => 'PropertyFilteringAttrController@index',
    ]);

    /* Vehicles */
    $app->get('attributes/vehicle', [
        'uses' => 'VehicleFilteringAttrController@index',
    ]);

    /* Others */
    $app->get('attributes/other', [
        'uses' => 'OtherFilteringAttrController@index',
    ]);
});
