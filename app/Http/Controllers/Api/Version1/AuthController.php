<?php

namespace App\Http\Controllers\Api\Version1;

use App\Http\Controllers\Api\Controller as BaseController;
use Illuminate\Http\Request;
use App\User;
use App\Session;
use App\Services\Auth;

use App\Http\Requests;

class AuthController extends BaseController{


	/**
	 * Create user (Temp, for testing)
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function createUser(Request $request){

		$name = $request -> input('name');
		$email = $request -> input('email');
		$pass = $request -> input('password');

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($pass),
        ]);

		return $this -> json([
			'status' => 'Success'
		]);

	}

	/**
	 * Get token for a session
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function login(Request $request){

		//$session = Auth::attempt($request -> only('name','password'));
		$session = Auth::attempt($request -> only('email','password'));

		if(!$session){

			return $this -> json([
				'status' => 'Error',
				'message' => 'Wrong credentials'
			]);
		}

		return $this -> json([
			'status' => 'Success',
			'data' => [
				'token' => $session -> token
			]
		]);

	}

	/**
	 * Check if token is valid
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function check($token,Request $request){

		$session = Session::where('token','=',$token) -> first();

		if(!$session){

			return $this -> json([
				'status' => 'Error',
				'message' => 'Session not found'
			]);
		}

		return $this -> json([
			'status' => 'Success',
			'message' => 'Session active'
		]);

	}

	/**
	 * Delete a session
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function logout($token,Request $request){


		$session = Session::where('token','=',$token) -> first();

		if(!$session){

			return $this -> json([
				'status' => 'Error',
				'message' => 'Session not found'
			]);
		}

		$session -> delete();

		return $this -> json([
			'status' => 'Success',
			'message' => 'Session deleted'
		]);

	}
}
