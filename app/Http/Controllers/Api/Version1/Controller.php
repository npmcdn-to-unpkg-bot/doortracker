<?php

namespace App\Http\Controllers\Api\Version1;

use App\Http\Controllers\Api\Controller as BaseController;

class Controller extends BaseController{

	/**
	 * Name of model
	 *
	 * @var
	 */
	protected $model;

	/**
	 * Retrieve all data
	 *
	 * @return Response
	 */
	public function all(){
		
		$response = ['Yohohohoh!'];
		
		return $this -> json($response);

	}

}
