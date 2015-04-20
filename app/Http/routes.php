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

$app->get('/', function () use ($app) {
    return $app->welcome();
});

$app->get('/test/map', function () {
    Bus::dispatch(new App\Jobs\Import\Map());

    return 'Done!';
});

$app->get('/test/raw', function () {
    Bus::dispatch(new App\Jobs\Import\Website());

    return 'Done!';
});

$app->get('/test/extract', function () {
    Bus::dispatch(new App\Jobs\Extract\RawData());

    return 'Done !';
});
