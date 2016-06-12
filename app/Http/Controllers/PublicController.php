<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;

class PublicController extends BaseController{


	/**
	 * Issue Schema
	 *
	 * @var
	 */
	protected $__schemaIssue = 'App\Schema\Issue';

	/**
	 * Index Route 
	 *
	 * @param Request $request
	 */
	public function index(Request $request){
		return view('app',['schema' => $this -> getSchemaIssue()]);
	}

	/**
	 * Return schema Issue
	 */
	public function getSchemaIssue(){
		return new $this -> __schemaIssue();
	}


}
