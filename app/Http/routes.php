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

Route::group(['as' => 'api' ], function(){

	Route::group(['as' => 'v1' ], function(){

		Route::group(['as' => 'issue' ], function(){

			# Get all records
			Route::get('/',									['as' => '', 'uses' => 'Api\Version1\IssueController@all']);
		});
	});

});