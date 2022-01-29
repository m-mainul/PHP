<?php 
require_once 'core/init.php';
// This is for security like CSRF-Cross Site Request Forgery
// Token class allows first generate token class
// Check token is valid or exists and delete the token
class Token {
	public static function generate() {
		// return Session::put('token', md5(uniqid()));
		return Session::put(Config::get('session/token_name'), md5(uniqid()));
	}

	public static function check($token) {
		$tokenName = Config::get('session/token_name');

		if(Session::exists($tokenName) && $token === Session::get($tokenName)) {
			Session::delete($tokenName);
			return true;
		}

		return false;
	}
}