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

Route::get('/home', function(){
	return view('home');
});

//add profile
Route::get('/addProfile', ['middleware' => 'auth', 'as' => 'addProfile', 'uses' => 'UsersController@addProfile']);	//add profile
Route::get('/handleAddProfile', ['middleware' => 'auth', 'as' => 'handleAddProfile', 'uses' => 'UsersController@handleAddProfile']);	//handle add profile

//edit profile
Route::get('/editProfile', ['middleware' => 'auth', 'as' => 'editProfile', 'uses' => 'UsersController@editProfile']);	//edit profile
Route::post('/handleEditProfile', ['middleware' => 'auth', 'as' => 'handleEditProfile', 'uses' =>'UsersController@store']); //handle edit profile

//signin and signup
Route::get('/signin', ['as' => 'signin', 'uses' =>'UsersController@signin']); //Signin landing page
Route::get('/signup', ['as' => 'signup', 'uses' =>'UsersController@signup']); //Signup landing page

Route::post('/handleSignup', ['as' => 'handleSignup', 'uses' =>'UsersController@store']); //handle signup
Route::post('/handleSignin', ['as' => 'handleSignin', 'uses' =>'UsersController@handleSignin']); //handle signin

//verification

Route::get('/verify', ['as' => 'verify', 'uses' =>'UsersController@verify']); 
Route::post('/handleVerify', ['as' => 'handleVerify', 'uses' =>'UsersController@handleVerify']); 

//manage profile

Route::get('/profile', ['as' => 'profile', 'uses' =>'UsersController@viewProfile']); 
Route::post('/manageProfile', ['as' => 'manageProfile', 'uses' =>'UsersController@manageProfile']); 
