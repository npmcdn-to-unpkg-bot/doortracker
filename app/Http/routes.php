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

Route::get('/',function(){
	return view('welcome');
});


/*
|--------------------------------------------------------------------------
| API
|--------------------------------------------------------------------------
|
| All api routes
|
*/

Route::group(['namespace' => 'Api' ],function(){

	Route::group(['namsepace' => 'Version1'],function(){

		# Get all records
		Route::get('/api/v1/issues',				['as' => 'index', 'uses' => 'Version1\IssueController@all']);
	
	});

});