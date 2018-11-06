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

Route::get('add', function(){
  return \App\User::first()->add_friend(2);
});

Route::get('accept', function(){
  return \App\User::find(2)->accept_friend(1);
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

  Route::post('/home/post',[
    'uses' => 'PostController@store',
    'as' => 'post.store'
  ]);
});
