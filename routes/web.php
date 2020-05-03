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

$router->get("/kabupaten", "DistrictController@index");
$router->get("/kabupaten/{no}", "DistrictController@show");
$router->put("/kabupaten/{no}", "DistrictController@update");
$router->get("/provinsi", "ProvinceController@index");
$router->get("/provinsi/{code}", "ProvinceController@show");
$router->put("/provinsi/{code}", "ProvinceController@update");
$router->put("/provinsi", "ProvinceController@updateAll");

$router->get("/rumahsakit", "HospitalController@index");
$router->get("/rumahsakit/{no}", "HospitalController@show");
$router->get("/posko", "PostsController@index");
$router->get("/statistik", "StatController@index");
$router->post('/statistik', "StatController@store");
$router->get('/statistik/{day}', "StatController@show");
$router->put('/statistik/{day}', "StatController@update");
