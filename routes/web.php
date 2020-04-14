<?php

use \Illuminate\Support\Str as Str;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Generate App Key
$router->get("/key", ['middleware' => 'throttle:2,1', function () {
    return Str::random(32);
}]);

$router->get("/kabupaten", "KabupatenController@getAllKabupaten");
$router->get("/kabupaten/{no}", "KabupatenController@getKabupatenByNo");
$router->put("/kabupaten/{no}", "KabupatenController@updateKabupaten");
$router->get("/provinsi", "ProvinsiController@index");
$router->get("/provinsi/{code}", "ProvinsiController@get");
$router->put("/provinsi/{code}", "ProvinsiController@update");

$router->get("/rumahsakit", "RumahSakitController@getAllRumahSakit");
$router->get("/rumahsakit/{no}", "RumahSakitController@getRumahSakitByNo");
$router->get("/posko", "PoskoController@getAllPosko");
