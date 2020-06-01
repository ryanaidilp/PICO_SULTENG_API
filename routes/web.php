<?php

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

$router->get('/kabupaten', ['as' => 'district.index', 'uses' => 'DistrictController@index']);
$router->get('/kabupaten/{no}', ['as' => 'district.show', 'uses' => 'DistrictController@show']);
$router->get('/provinsi', ['as' => 'province.index', 'uses' => 'ProvinceController@index']);
$router->get('/provinsi/{code}', ['as' => 'province.show', 'uses' => 'ProvinceController@show']);
$router->put('/provinsi', ['as' => 'province.update.all', 'uses' => 'ProvinceController@updateAll']);

$router->get('/rumahsakit', ['as' => 'hospital.index', 'uses' => 'HospitalController@index']);
$router->get('/rumahsakit/{no}', ['as' => 'hospital.show', 'uses' => 'HospitalController@show']);
$router->get('/posko', ['as' => 'posts.index', 'uses' => 'PostsController@index']);
$router->get('/statistik', ['as' => 'stats.index', 'uses' => 'StatController@index']);
$router->get('/statistik/{day}', ['as' => 'stats.show', 'uses' => 'StatController@show']);
$router->get('/command/{cmd}', ['as' => 'home.artisan', 'uses' => 'HomeController@artisan']);
$router->group(['prefix' => 'v2'], function () use ($router) {
    $router->get('/statistik', ['as' => 'v2.stats.index', 'uses' => "v2\StatController@index"]);
    $router->get('/statistik/{day}', ['as' => 'v2.stats.show', 'uses' => "v2\StatController@show"]);
    $router->get('/nasional', ['as' => 'v2.national.stats.index', 'uses' => "v2\NationalStatisticController@index"]);
    $router->get('/nasional/{day}', ['as' => 'v2.national.stats.show', 'uses' => "v2\NationalStatisticController@show"]);
    $router->get('/kabupaten', ['as' => 'v2.district.index', 'uses' => "v2\DistrictController@index"]);
    $router->get('/kabupaten/{no}', ['as' => 'v2.district.show', 'uses' => "v2\DistrictController@show"]);
    $router->get('/provinsi', ['as' => 'v2.province.index', 'uses' => "v2\ProvinceController@index"]);
    $router->get('/provinsi/{code}', ['as' => 'v2.province.show', 'uses' => "v2\ProvinceController@show"]);
    $router->get('/rumahsakit', ['as' => 'v2.hospital.index', 'uses' => "v2\HospitalController@index"]);
    $router->get('/rumahsakit/{no}', ['as' => 'v2.hospital.show', 'uses' => "v2\HospitalController@show"]);
    $router->get('/posko', ['as' => 'v2.posts.index', 'uses' => 'v2\PostsController@index']);
});
