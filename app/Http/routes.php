<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', function () {
    return view('index');
});

$app->group(['namespace' => 'App\Http\Controllers'], function () use ($app) {
    $app->get('api/v1/home', ['as' => 'home', 'uses' => 'HomeController@index']);
    $app->post('api/v1/vehicles', ['as' => 'vehicles', 'uses' => 'VehicleController@index']);
});
