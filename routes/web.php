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

Auth::routes(['verify' => true]);



Route::group(['middleware' => 'auth'], function () {
  Route::get('/home', 'HomeController@index')->name('home');

  Route::get('/profiles/{slug}', 'ProfileController@viewProfile');

  Route::get('/profiles/edit/{slug}', [
    'uses' => 'ProfileController@editProfile',
    'as' => 'profile.edit'
  ]);

  Route::post('/profiles/update', [
    'uses' => 'ProfileController@updateProfile',
    'as' => 'profile.update'
  ]);
});
