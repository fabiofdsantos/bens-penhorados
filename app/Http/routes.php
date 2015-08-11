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

$app->group(['prefix' => 'api/v1/', 'namespace' => 'App\Http\Controllers'], function () use ($app) {
    $app->get('home', ['uses' => 'HomeController@index']);
    $app->get('vehicles', ['uses' => 'VehicleResultsController@index']);
    $app->get('vehicles/{slug}', ['uses' => 'VehicleSingleController@show']);
});
