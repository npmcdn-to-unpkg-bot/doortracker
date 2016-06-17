<?php

namespace App\Http\Controllers\Api\Version1;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    /**
	 * Name of model
	 *
	 * @var
	 */
	protected $model = 'App\User';

	/**
	 * Name of Schema
	 *
	 * @var
	 */
	protected $__schema = 'App\Schema\User';

	/**
	 * All
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function all(Request $request){
		return parent::all($request);
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
		return parent::get($id,$request);
	}

	/**
	 * Add
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function add(Request $request){
		return parent::add($request);
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
		return parent::edit($id,$request);
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
		return parent::delete($id,$request);
	}
}
