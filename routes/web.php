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

$router->get("/kabupaten", "KabupatenController@index");
$router->get("/kabupaten/{no}", "KabupatenController@show");
$router->put("/kabupaten/{no}", "KabupatenController@update");
$router->get("/provinsi", "ProvinsiController@index");
$router->get("/provinsi/{code}", "ProvinsiController@show");
$router->put("/provinsi/{code}", "ProvinsiController@update");
$router->put("/provinsi", "ProvinsiController@updateAll");

$router->get("/rumahsakit", "RumahSakitController@index");
$router->get("/rumahsakit/{no}", "RumahSakitController@show");
$router->get("/posko", "PoskoController@index");
