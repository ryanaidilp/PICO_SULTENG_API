<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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


$router->get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

$router->group(['middleware' => ['throttle:20,2']], function () use ($router) {
    $router->group(['namespace' => 'v1'], function () use ($router) {
        $router->get('/kabupaten', ['as' => 'regency.index', 'uses' => 'RegencyController@index']);
        $router->get('/kabupaten/{code}', ['as' => 'regency.show', 'uses' => 'RegencyController@show']);
        $router->get('/provinsi', ['as' => 'province.index', 'uses' => 'ProvinceController@index']);
        $router->get('/provinsi/{code}', ['as' => 'province.show', 'uses' => 'ProvinceController@show']);

        $router->get('/rumahsakit', ['as' => 'hospital.index', 'uses' => 'HospitalController@index']);
        $router->get('/rumahsakit/{code}', ['as' => 'hospital.show', 'uses' => 'HospitalController@show']);
        $router->get('/posko', ['as' => 'posts.index', 'uses' => 'TaskForceController@index']);
        $router->get('/statistik', ['as' => 'stats.index', 'uses' => 'ProvinceCaseController@index']);
        $router->get('/statistik/{day}', ['as' => 'stats.show', 'uses' => 'ProvinceCaseController@show']);
        $router->get('/command/{cmd}', ['as' => 'home.artisan', 'uses' => 'HomeController@artisan']);
    });

    $router->group(['prefix' => 'v2', 'namespace' => 'v2'], function () use ($router) {
        $router->get('/statistik', ['as' => 'v2.stats.index', 'uses' => 'ProvinceCaseController@index']);
        $router->get('/statistik/{day}', ['as' => 'v2.stats.show', 'uses' => 'ProvinceCaseController@show']);
        $router->get('/nasional', ['as' => 'v2.national.stats.index', 'uses' => 'NationalCaseController@index']);
        $router->get('/nasional/{day}', ['as' => 'v2.national.stats.show', 'uses' => 'NationalCaseController@show']);
        $router->get('/kabupaten', ['as' => 'v2.regency.index', 'uses' => 'RegencyController@index']);
        $router->get('/kabupaten/harian/{code}', ['as' => 'v2.regency.daily', 'uses' => 'RegencyController@daily']);
        $router->get('/kabupaten/{code}', ['as' => 'v2.regency.show', 'uses' => 'RegencyController@show']);
        $router->get('/provinsi', ['as' => 'v2.province.index', 'uses' => 'ProvinceController@index']);
        $router->get('/provinsi/{code}', ['as' => 'v2.province.show', 'uses' => 'ProvinceController@show']);
        $router->get('/rumahsakit', ['as' => 'v2.hospital.index', 'uses' => 'HospitalController@index']);
        $router->get('/rumahsakit/{code}', ['as' => 'v2.hospital.show', 'uses' => 'HospitalController@show']);
        $router->get('/posko', ['as' => 'v2.posts.index', 'uses' => 'TaskForceController@index']);
    });
});
