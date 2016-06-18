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


/*
Route::get('/',										['as' => 'index', 'uses' => 'PublicController@index']);
*/
Route::get('/',										['as' => 'home', 'uses' => 'PublicController@home']);



/*
|--------------------------------------------------------------------------
| API
|--------------------------------------------------------------------------
|
| All api routes
|
*/

Route::group(['namespace' => 'Api' ],function(){

	Route::group(['namespace' => 'Version1'],function(){

		# Issues
		Route::get('/api/v1/issues',				['as' => 'index', 'uses' => 'IssueController@all']);
		Route::get('/api/v1/issues/{id}',			['as' => 'get', 'uses' => 'IssueController@get']);

		Route::post('/api/v1/issues',				['as' => 'add', 'uses' => 'IssueController@add']);
		Route::post('/api/v1/issues/{id}',			['as' => 'edit', 'uses' => 'IssueController@edit']);
		Route::delete('/api/v1/issues/{id}',		['as' => 'delete', 'uses' => 'IssueController@delete']);


		# Users 
		Route::get('/api/v1/users',					['as' => 'index', 'uses' => 'UserController@all']);
		Route::get('/api/v1/users/{id}',			['as' => 'get', 'uses' => 'UserController@get']);

		Route::post('/api/v1/users',				['as' => 'add', 'uses' => 'UserController@add']);
		Route::post('/api/v1/users/{id}',			['as' => 'edit', 'uses' => 'UserController@edit']);
		Route::delete('/api/v1/users/{id}',			['as' => 'delete', 'uses' => 'UserController@delete']);


		# Get issue author
		Route::get('/api/v1/issues/{id}/users',		['as' => 'get', 'uses' => 'IssueController@getAuthor']);

		# Get token session
		Route::post('/api/v1/auth/',			['as' => 'get', 'uses' => 'AuthController@login']);

		# Check if a token/session is still valid
		Route::get('/api/v1/auth/{token}',	 		['as' => 'get', 'uses' => 'AuthController@check']);

		# Delete a session
		Route::delete('/api/v1/auth/{token}',	 	['as' => 'get', 'uses' => 'AuthController@logout']);

		# Temp, create a user
		Route::get('/api/v1/createUser',			['as' => 'get', 'uses' => 'AuthController@createUser']);
	
	});

});

/*
|--------------------------------------------------------------------------
| Views
|--------------------------------------------------------------------------
|
| All app pages.
|
*/

Route::group(['prefix' => 'pages'], function(){

	Route::group(['prefix' => 'issues'], function() {

		Route::get('/list', function() {
			return view('pages.issues.list');
		});

		Route::get('/new', function() {
			return view('pages.issues.new');
		});

		Route::get('/detail/{id}', function() {
			return view('pages.issues.detail');
		});


	});
});

