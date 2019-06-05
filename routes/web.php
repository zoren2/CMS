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

Auth::routes(); // List of routes for authentication

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categories/new','HomeController@categories');

Route::get('/categories', 'HomeController@listindex'); // Retrieves list of items

Route::post('store-category','HomeController@store');

Route::get('categories/{category}/delete', 'HomeController@destroy');