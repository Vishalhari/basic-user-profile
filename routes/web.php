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


Route::resource('/', 'HomeController');
Route::resource('/user', 'HomeController');
Route::get('/Register','HomeController@create');
Route::get('/otpverification', 'HomeController@otpverification');
Route::post('/verification', 'HomeController@verification');
Route::resource('/login', 'loginController');

Route::get('/userhome', 'ProfileController@userHome');
Route::post('/logout', 'loginController@logout')->name('logout');
Route::resource('/profile', 'ProfileController');
