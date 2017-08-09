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
	return view('welcome');
});

Route::get('/logout', ['as' => 'logout', 'uses' => 'UsersController@logout']);

//search
Route::get('/search', ['middleware' => 'auth', 'as' => 'search', 'uses' => 'SearchController@search']);

//Profile
Route::get('/handleProfile', ['middleware' => 'auth', 'as' => 'handleProfile', 'uses' => 'UsersController@handleProfile']);
Route::get('/profile', ['middleware' => 'auth', 'as' => 'profile', 'uses' => 'UsersController@profile']);
Route::get('/addProfile', ['middleware' => 'auth', 'as' => 'addProfile', 'uses' => 'UsersController@addProfile']);
Route::post('/handleAddProfile', ['middleware' => 'auth', 'as' => 'handleAddProfile', 'uses' => 'UsersController@handleAddProfile']);
Route::get('/editProfile', ['middleware' => 'auth', 'as' => 'editProfile', 'uses' => 'UsersController@addProfile']);
Route::post('/handleEditProfile', ['middleware' => 'auth', 'as' => 'handleEditProfile', 'uses' =>'UsersController@handleEditProfile']);

//Family Tree
Route::get('/familyTree', ['middleware' => 'auth', 'as' => 'familyTree', 'uses' => 'TreeController@familyTree']);
Route::get('/addFamilyTree', ['middleware' => 'auth', 'as' => 'addFamilyTree', 'uses' => 'TreeController@addFamilyTree']);
Route::get('/editFamilyTree', ['middleware' => 'auth', 'as' => 'editFamilyTree', 'uses' => 'TreeController@editFamilyTree']);
Route::post('/handleAddFamilyTree', ['middleware' => 'auth', 'as' => 'handleAddFamilyTree', 'uses' => 'TreeController@handleAddFamilyTree']);
Route::post('/handleEditFamilyTree', ['middleware' => 'auth', 'as' => 'handleEditFamilyTree', 'uses' => 'TreeController@handleEditFamilyTree']);

//signin and signup
Route::get('/signin', ['as' => 'signin', 'uses' =>'UsersController@signin']); //Signin landing page
Route::get('/signup', ['as' => 'signup', 'uses' =>'UsersController@signup']); //Signup landing page

Route::post('/handleSignup', ['as' => 'handleSignup', 'uses' =>'UsersController@store']); //handle signup
Route::post('/handleSignin', ['as' => 'handleSignin', 'uses' =>'UsersController@handleSignin']); //handle signin

//verification

Route::get('/verify', ['as' => 'verify', 'uses' =>'UsersController@verify']); 
Route::post('/handleVerify', ['as' => 'handleVerify', 'uses' =>'UsersController@handleVerify']);