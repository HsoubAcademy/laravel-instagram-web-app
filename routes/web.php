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

Auth::routes();
Route::get('/', function () {
	if(Auth::check())
		return redirect('/home');
	else
	    return view('auth/login');
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('post','PostController');

	Route::get('user/posts','PostController@userPosts');

	Route::get('user/{id}/posts','PostController@userFriendPosts');

	Route::resource('follow','FollowController');
	
	Route::get('user/followers','FollowController@index');

	Route::get('user/profile','UserController@edit');
	
	Route::get('users','UserController@index');

	Route::get('search','UserController@autocomplete');

	Route::patch('user','UserController@update');

	Route::get('user_info/{id}','UserController@user_info');

	Route::resource('comment','CommentController');

	Route::resource('like','LikeController');

	Route::get('/home', 'PostController@index')->name('home');
});
