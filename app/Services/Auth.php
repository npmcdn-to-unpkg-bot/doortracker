<?php

namespace App\Services;

use App\User;
use App\Session;

class Auth{
    
    /**
     * Attempt to login
     *
     * @param array $data
     *
     * @return bool|Session
     */
    public static function attempt($data){

    	# Delete expired Session
    	Auth::expired();
    	
    	//$user = User::where(['name' => $data['name']]) -> first();
        $user = User::where(['email' => $data['email']]) -> first();

    	# If user doesn't exists
    	if(!$user){
    		return false;
    	}

    	# If password doesn't match
    	if(!app('hash') -> check($data['password'],$user -> password)){
    		return false;
    	}

    	# Create a simple token
    	$token = sha1(microtime());

    	return Session::create([
    		'token' => $token,
    		'user_id' => $user -> id
    	]);
    }

    /**
     * Delete expired session
     */
    public static function expired(){
    	$expiration = (new \DateTime()) -> modify('-1 week');
    	Session::where('created_at','<',$expiration) -> delete();
    }
}
