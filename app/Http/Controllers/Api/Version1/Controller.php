<?php

namespace App\Http\Controllers\Api\Version1;

use App\Http\Controllers\Api\Controller as BaseController;
use Illuminate\Http\Request;

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
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function all(Request $request){
		
		$schema = $this -> getSchema();
		$resources = call_user_func($this -> model.'::select',$schema -> getFieldsName()) -> get() -> toArray();

		$response = [
			'status' => 'Success',
			'data' => $resources
		];

		return $this -> json($response);

	}

	/**
	 * Get
	 *
	 * @param int $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function get($id,Request $request){
		
		$schema = $this -> getSchema();


		$resource = call_user_func($this -> model.'::where',['id' => $id]) -> first();	

		$response = [
			'status' => 'Success',
			'data' => $resource -> toArray()
		];

		return $this -> json($response);

	}

	/**
	 * Add
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function add(Request $request){
		
		$schema = $this -> getSchema();

		$fields = $request -> all();
		$resource = call_user_func($this -> model.'::create',$fields);

		$response = [
			'status' => 'Success',
			'data' => $resource -> toArray()
		];

		return $this -> json($response);

	}

	/**
	 * Edit
	 *
	 * @param int $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function edit($id,Request $request){
		
		$schema = $this -> getSchema();

		$fields = $request -> all();
		$resource = call_user_func($this -> model.'::where',['id' => $id]) -> first();

		$resource -> fill($fields);
		$resource -> save();

		$response = [
			'status' => 'Success',
			'data' => $resource -> toArray()
		];

		return $this -> json($response);

	}

	/**
	 * Delete
	 *
	 * @param int $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function delete($id,Request $request){
		
		$schema = $this -> getSchema();

		$resource = call_user_func($this -> model.'::where',['id' => $id]) -> delete();

		$response = [
			'status' => 'Success'
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
