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
Route::get('/profiles/{slug}', [
   'uses' => 'ProfileController@viewProfile',
   'as' => 'profile'
   ]);
// NOTIFICATION FUNCTIONS
Route::get('/get_unread', function(){
   return Auth::user()->unreadNotifications;
});

// FRIENDS FUNCTION
Route::get('add', function(){
  return \App\User::find(12)->add_friend(13);
});
Route::get('add_friend/{id}', [
  'uses' => 'FriendshipsController@add_friend',
  'as'   => 'add_friend'
]);
Route::get('accept_friend/{id}', [
  'uses' => 'FriendshipsController@accept_friend',
  'as'   => 'accept_friend'
]);


Route::get('accept', function(){
  return \App\User::find(13)->accept_friend(12);
});

Route::get('/friends', function(){
  return \App\User::find(11)->friends();
});

Route::get('/pending-request', function(){
  return \App\User::find(13)->pending_friend_requests();
});

Route::get('/ids', function(){
  return \App\User::find(13)->friends_ids();
});

Route::get('/is-friends-with', function(){
  return \App\User::find(11)->is_friends_with(12);
});

Route::get('/pending-friend-requests-sent', function(){
  return \App\User::find(11)->pending_friend_requests_sent();
});

Route::get('/pending-friend-requests-sent-ids', function(){
  return \App\User::find(11)->pending_friend_requests_sent_ids();
});

Route::get('/has-pending-friend-requests-from', function(){
  return \App\User::find(13)->has_pending_friend_requests_from(11);
});

Route::get('/has-pending-friend-requests-sent-to', function(){
  return \App\User::find(11)->has_pending_friend_requests_sent_to(13);
});

Route::get('/check_relationship_status/{id}', [
  'uses' => 'FriendshipsController@check',
  'as' => 'check'
]);



Route::group(['middleware' => 'auth'], function () {


  //OTHER FUNCTIONS
  Route::get('/', 'HomeController@index2')->name('home');

  Route::get('/home', 'HomeController@index')->name('home');

  Route::get('/home/delete/{postId}', 'PostController@delete');

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
