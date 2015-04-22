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

