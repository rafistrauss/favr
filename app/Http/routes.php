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

Route::get('/', 'HomeController@index');
Route::get('/pages/dashboard', 'PagesController@show');

Route::get('/pages/account', 'PagesController@edit');
Route::get('/pages/newfavor', 'PagesController@newfavor');
Route::get('/pages/postcategories', 'PagesController@postcategories');
Route::get('/pages/docategories', 'PagesController@docategories');
Route::get('/pages/actualfavor/{category}', 'PagesController@actualfavor');
Route::post('/createfavor', 'PagesController@createfavor');
Route::get('/pages/printing_feed/{category}', 'PagesController@printingfeed');
Route::get('/favorasked', 'PagesController@favorasked');
Route::get('/pages/myfavors', 'PagesController@myfavors');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
