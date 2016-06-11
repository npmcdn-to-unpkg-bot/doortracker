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
	 * Schema
	 *
	 * @var
	 */
	protected $__schema;

	/**
	 * Retrieve all data
	 *
	 * @return Response
	 */
	public function all(){
		
		$schema = $this -> getSchema();
		$resources = call_user_func($this -> model.'::select',$schema -> getFieldsName()) -> get() -> toArray();

		$response = [
			'status' => 'Success',
			'data' => $resources
		];

		return $this -> json($response);

	}

	/**
	 * Get schema
	 */
	public function getSchema(){
		return new $this -> __schema();
	}

}
