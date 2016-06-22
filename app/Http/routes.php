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

Route::group(['middleware' => 'web'], function () {

	// khusus untuk showpost dengan plugin datatables
	// Route::controller('showPost', 'DatatablesController', [
	// 	'middleware' => 'auth',
	//     'anyData'  => 'datatables.data',
	//     'getIndex' => 'datatables',
	//     'uses' => 'getIndex',
	// ]);

	Route::controller('anyData', 'DatatablesController', ['anyData' => 'datatables.data']);
	Route::get('showPost', ['middleware' => 'auth', 'uses' => 'DatatablesController@getIndex']);
	// route page normal atau biasa
	Route::get('/', 'ArticleController@index');
	Route::get('about', 'PageController@about');
	Route::get('artikel', 'ArticleController@articles');
	Route::get('contact', 'PageController@contact');
	Route::get('single', 'PageController@single');
	Route::get('tutorial', 'ArticleController@tutorials');
	Route::get('tutorials/search', 'ArticleController@searchTutor');
	Route::get('artikel/search', 'ArticleController@searchArt');

	Route::get('createPost',  ['middleware' => 'auth', 'uses' => 'PageController@createPost']);
	// Route::get('createPost', 'PageController@createPost');
	
	//route khusus crud artikel
	Route::post('post_artikel', ['middleware' => 'auth', 'uses' => 'PostController@create_post']);
	// Route::get('showPost', 'PageController@showPost');
	// Route::post('show_all_post', 'PostController@show_all_post');
	Route::get('post/edit/{id}', ['middleware' => 'auth', 'uses' => 'PostController@editPost']);
	Route::post('post/edit/{id}/update_post', ['middleware' => 'auth', 'uses' => 'PostController@update_post']);
	Route::post('showPost/delete', 'PostController@delete_post');
	
	// route untuk menampilkan posting 
	Route::get('{kategori}/{SubKategori1}/{slug}', 'ArticleController@show_detail_post');
	Route::get('{kategori}/{SubKategori1}/{SubKategori2}/{slug}', 'ArticleController@show_detail_post2');
	Route::get('{kategori}/{SubKategori1}/{SubKategori2}/{SubKategori3}/{slug}', 'ArticleController@show_detail_post3');
	//Route::auth();
	//Route::get('/home', 'HomeController@index');
	
	Route::get('PanasBroDiluar', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
	Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
	Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

	// Registration Routes...
	Route::get('BukanDemiUang', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@showRegistrationForm']);
	Route::post('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@register']);

	// Password Reset Routes...
	Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
	Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
	Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);

	Route::post('addUserAdmin', 'UserController@add');
	Route::post('Adminlogin', 'UserController@login');
});


