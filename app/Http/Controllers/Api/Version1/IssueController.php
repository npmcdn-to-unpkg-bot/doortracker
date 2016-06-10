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
     * List of all fields
     *
     * @var array
     */
    protected $fields = [
        'name' => [],
        'description' => [],
        'status' => [],
        'priority' => [],
        'author_id' => []
    ];

	/**
	 * Retrieve all data
	 *
	 * @return Response
	 */
	public function all(){
		return parent::all();
	}

}
