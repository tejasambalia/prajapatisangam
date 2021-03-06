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

Route::get('/', ['as' => '/', 'uses' => 'StaticpageController@welcome']);
Route::get('/index', ['as' => 'index', 'uses' => 'StaticpageController@welcome']);

Route::get('/test', ['as' => 'test', 'uses' => 'StaticpageController@test']);

Route::get('/logout', ['as' => 'logout', 'uses' => 'UsersController@logout']);

//search
Route::get('/search', ['as' => 'search', 'uses' => 'SearchController@search']);

//new features
Route::get('/news', ['as' => 'news', 'uses' => 'FeaturesController@news']);
Route::get('/books', ['as' => 'books', 'uses' => 'FeaturesController@books']);
Route::get('/videos', ['as' => 'videos', 'uses' => 'FeaturesController@videos']);

//dynamic features link
Route::get('/video/{title}/{id}', ['as' => 'video', 'uses' => 'FeaturesController@video']);

//Profile
Route::get('/handleProfile', ['middleware' => 'auth', 'as' => 'handleProfile', 'uses' => 'UsersController@handleProfile']);
Route::get('/profile', ['middleware' => 'auth', 'as' => 'profile', 'uses' => 'UsersController@profile']);
Route::get('/profile/{userName}/{userId}', ['as' => 'openProfile', 'uses' => 'UsersController@openProfile']);
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

//user functions
Route::get('/upload', ['as' => 'upload', 'middleware' => 'auth', 'uses' => 'FeaturesController@upload']);
Route::post('handleUpload', ['as' => 'handleUpload', 'middleware' => 'auth', 'uses' => 'FeaturesController@handleUpload']);
Route::get('/content', ['as' => 'content', 'uses' => 'FeaturesController@publicContent']);

//static company policy
Route::get('/about', ['as' => 'about', 'uses' =>'StaticpageController@about']);
Route::get('/terms', ['as' => 'terms', 'uses' =>'StaticpageController@terms']); 
Route::get('/faqs', ['as' => 'faqs', 'uses' =>'StaticpageController@faqs']); 
Route::get('/team', ['as' => 'team', 'uses' => 'StaticpageController@team']);
//cron
Route::get('/createRelation', ['as' => 'createRoute', 'uses' => 'CronController@createRelation']);
Route::get('/sitemap', ['as' => 'sitemap', 'uses' => 'SitemapController@sitemap']);
Route::get('/fetchnews', ['as' => 'fetchnews', 'uses' => 'NewsController@callapi']);

//api
//signup api
Route::post('/api/signup/key/UQd24t2xs6C9bhRs', ['as' => 'api_signup', 'middleware' => 'api', 'uses' => 'Api\UsersController@signup']);
Route::post('/api/signin/key/UQd24t2xs6C9bhRs', ['as' => 'api_signin', 'middleware' => 'api', 'uses' => 'Api\UsersController@signin']);