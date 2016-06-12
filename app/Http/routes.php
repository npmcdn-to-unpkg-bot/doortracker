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

Route::get('/',										['as' => 'index', 'uses' => 'PublicController@index']);


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

		# Get all records
		Route::get('/api/v1/issues',				['as' => 'index', 'uses' => 'IssueController@all']);
		Route::get('/api/v1/issues/{id}',			['as' => 'get', 'uses' => 'IssueController@get']);

		Route::post('/api/v1/issues',				['as' => 'add', 'uses' => 'IssueController@add']);
		Route::post('/api/v1/issues/{id}',			['as' => 'edit', 'uses' => 'IssueController@edit']);
		Route::delete('/api/v1/issues/{id}',		['as' => 'delete', 'uses' => 'IssueController@delete']);
	
	});

});


/* 
 * More resources go here.
 *
 */
/*
Route::group(['prefix' => 'xtrack/api'], function(){
	Route::resource('items', 'ItemController',
		['only' => ['index', 'show', 'store', 'update', 'destroy']]);

});
*/
