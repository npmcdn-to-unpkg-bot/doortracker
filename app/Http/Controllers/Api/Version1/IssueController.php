<?php

namespace App\Http\Controllers\Api\Version1;


class IssueController extends Controller{

	/**
	 * Name of model
	 *
	 * @var
	 */
	protected $model = 'App\Issue';

	/**
	 * Name of Schema
	 *
	 * @var
	 */
	protected $__schema = 'App\Schema\Issue';

	/**
	 * Retrieve all data
	 *
	 * @return Response
	 */
	public function all(){
		return parent::all();
	}

}
