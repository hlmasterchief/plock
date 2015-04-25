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

Route::get('/', 'WelcomeController@index');

//set route for basic view
Route::get('/home', function () {
    return view('template.home');
});
Route::get('/profile', 'WelcomeController@posts_list');
Route::get('/box', 'WelcomeController@box');
Route::get('/boxs-list', 'WelcomeController@boxs_list');
Route::get('/posts-list', 'WelcomeController@posts_list');

Route::get('/post-test', function () {
    return view('template.post');
});

/**
 * Authentication
 */
Route::get('/login', 'AuthenticationController@getLogin');
Route::post('/login', 'AuthenticationController@postLogin');

Route::get('/logout', 'AuthenticationController@getLogout');

Route::get('/signup', 'AuthenticationController@getSignup');
Route::post('/signup', 'AuthenticationController@postSignup');

Route::get('/update', 'AuthenticationController@getUpdate');
Route::post('/update', 'AuthenticationController@postUpdate');

Route::get('/bookmark/create', 'BookmarkController@getCreate');
Route::post('/bookmark/create', 'BookmarkController@postCreate');

Route::get('/bookmark/update/{id}', 'BookmarkController@getUpdate');
Route::post('/bookmark/update/{id}', 'BookmarkController@postUpdate');

Route::get('/bookmark/delete/{id}', 'BookmarkController@getDelete');
Route::post('/bookmark/delete/{id}', 'BookmarkController@postDelete');

Route::get('/favourite/create', 'FavouriteController@getCreate');
Route::post('/favourite/create', 'FavouriteController@postCreate');

Route::get('/favourite/update/{id}', 'FavouriteController@getUpdate');
Route::post('/favourite/update/{id}', 'FavouriteController@postUpdate');

Route::get('/favourite/delete/{id}', 'FavouriteController@getDelete');
Route::post('/favourite/delete/{id}', 'FavouriteController@postDelete');

// Route::get('/follower', 'FollowerController@getFollower');
// Route::get('/following', 'FollowerController@getFollowing');

// Route::get('/follow/create/{id}', 'FollowerController@getCreate');
// Route::post('/follow/create/{id}', 'FollowerController@postCreate');

// Route::get('/follow/delete/{id}', 'FollowerController@getDelete');
// Route::post('/follow/delete/{id}', 'FollowerController@postDelete');3

Route::post('/follow/toggle', 'UserController@postToggleFollow');

Route::get('/comment/create', 'CommentController@getCreate');
Route::post('/comment/create', 'CommentController@postCreate');

Route::get('/comment/update/{id}', 'CommentController@getUpdate');
Route::post('/comment/update/{id}', 'CommentController@postUpdate');

Route::get('/comment/delete/{id}', 'CommentController@getDelete');
Route::post('/comment/delete/{id}', 'CommentController@postDelete');

Route::get('/profile/update', 'UserController@getUpdate');
Route::post('/profile/update', 'UserController@postUpdate');

Route::get('/upload/avatar', 'UserController@getAvatar');
Route::post('/upload/avatar', 'UserController@postAvatar');

Route::get('/upload/cover', 'UserController@getCover');
Route::post('/upload/cover', 'UserController@postCover');
