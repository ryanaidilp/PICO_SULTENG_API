<?php

use \Illuminate\Support\Str as Str;
/*
|--------------------------------------------------------------------------
| routerlication Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an routerlication.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

$router->get("/kabupaten", ['as' => 'district.index', 'uses' => "DistrictController@index"]);
$router->get("/kabupaten/{no}", ['as' => 'district.show', 'uses' => "DistrictController@show"]);
$router->put("/kabupaten/{no}", ['as' => 'district.update', 'uses' => "DistrictController@update"]);
$router->get("/provinsi", ['as' => 'province.index', 'uses' => "ProvinceController@index"]);
$router->get("/provinsi/{code}", ['as' => 'province.show', 'uses' => "ProvinceController@show"]);
$router->put("/provinsi/{code}", ['as' => 'province.update', 'uses' => "ProvinceController@update"]);
$router->put("/provinsi", ["as" => 'province.update.all', 'uses' => "ProvinceController@updateAll"]);
$router->post("/provinsi", ["as" => 'province.store', 'uses' => "ProvinceController@store"]);

$router->get("/rumahsakit", ["as" => 'hospital.index', 'uses' => "HospitalController@index"]);
$router->get("/rumahsakit/{no}", ["as" => 'hospital.show', 'uses' => "HospitalController@show"]);
$router->get("/posko", ["as" => 'posts.index', 'uses' => "PostsController@index"]);
$router->get("/statistik", ["as" => 'stats.index', 'uses' => "StatController@index"]);
$router->post('/statistik', ["as" => 'stats,store', 'uses' => "StatController@store"]);
$router->get('/statistik/{day}', ["as" => 'stats.show', 'uses' => "StatController@show"]);
$router->put('/statistik/{day}', ["as" => 'stats.update', 'uses' => "StatController@update"]);
$router->get('/command/{cmd}', ["as" => 'home.artisan', 'uses' => 'HomeController@artisan']);
$router->group(['prefix' => 'v2'], function () use ($router) {
    $router->get("/statistik", ["as" => 'v2.stats.index', 'uses' => "v2\StatController@index"]);
});
