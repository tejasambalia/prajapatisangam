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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function(){
	return view('index');
});

Route::get('/editProfile', function(){
	return view('editProfile');
});

Route::get('/home', function(){
	return view('home');
});

Route::get('/signin', ['as' => 'signin', 'uses' =>'UsersController@signin']); //Signin landing page
Route::get('/signup', ['as' => 'signup', 'uses' =>'UsersController@signup']); //Signup landing page

Route::post('/handleSignup', ['as' => 'handleSignup', 'uses' =>'UsersController@store']); //handle signup
Route::post('/handleSignin', ['as' => 'handleSignin', 'uses' =>'UsersController@handleSignin']); //handle signin

//email verification

Route::get('/verify/{userid}/{verificationcode}', ['as' => 'verify', 'uses' =>'UsersController@userVerification']); 

//manage profile

Route::get('/profile', ['as' => 'profile', 'uses' =>'UsersController@viewProfile']); 
Route::post('/manageProfile', ['as' => 'manageProfile', 'uses' =>'UsersController@manageProfile']); 
