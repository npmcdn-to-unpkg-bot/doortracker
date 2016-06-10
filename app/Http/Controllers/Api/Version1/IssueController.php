<?php

namespace App\Http\Controllers\Api\Version1;


class IssueController extends Controller{

	/**
	 * Name of model
	 *
	 * @var
	 */
	protected $model = 'App/Issue';

	/**
	 * Retrieve all data
	 *
	 * @return Response
	 */
	public function all(){
		return parent::all();
	}

}
