<?php 
// This is basically used by everything in the application
session_start();

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => '127.0.0.1',
		'username' => 'root',
		'password' => '',
		'db'	=> 'login_register_system'
	),
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expiry' => 604800
	),
	'session' => array(
		'session_name' => 'user',
		'token_name'   => 'token'
	)
);

// Including file directly is inefficient because if we change the file name then it will give fatal error
// require_once 'classes/Config.php';
// require_once 'classes/Cookie.php';
// require_once 'classes/DB.php';

// Instead of we use spl_autoload_register function
// Which will automatically load the class definition
spl_autoload_register(function($class) {	
	require_once 'classes/'.$class.'.php';
});
require_once 'functions/sanitize.php';