<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcomeLocation');
});

Route::get('/country','LocationController@allCountries');
Route::get('/get-country/{id}','LocationController@getCountry');
Route::get('/get-state/{id}','LocationController@getState');