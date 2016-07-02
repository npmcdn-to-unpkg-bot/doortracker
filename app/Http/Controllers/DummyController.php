<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;

use App\Http\Requests;

class DummyController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	// return some dummy data
    public function get() {
    	return response(['Success' => 'true'], 200);
    }
}
