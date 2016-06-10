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
	 * Array of fields
	 *
	 * @var
	 */
	protected $fields;

	/**
	 * Retrieve all data
	 *
	 * @return Response
	 */
	public function all(){
		

		$resources = call_user_func($this -> model.'::select',$this -> getFieldsName()) -> get() -> toArray();

		$response = [
			'status' => 'Success',
			'data' => $resources
		];

		return $this -> json($response);

	}

	/**
	 * Retrieve fields name
	 *
	 * @return Array
	 */
	public function getFieldsName(){
		return array_keys($this -> fields);
	}

}
