<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/win/{id}/{title}', ['uses' => 'HomeController@win']);
    Route::get('/user/{id}', ['uses' => 'HomeController@user']);
    Route::post('/user/signup', 'HomeController@signup');
    Route::get('/phone/request', 'HomeController@request');


});