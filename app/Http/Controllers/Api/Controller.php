<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController{

	public function json($message){
		return response() -> json($message);
	}


}
