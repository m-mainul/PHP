<?php 
require_once 'core/init.php';

if(Session::exists('home')) {
	echo '<p>'.Session::flash('home').'</p>';
}

if(Session::exists('success')) {
	echo Session::flash('success');
}

exit;

// So in this way we need more code in public page
// Instead we use helper method
// $users = DB::getInstance()->query('SELECT username FROM users');
// if($users->count()) {
// 	foreach ($users as $user) {
// 		echo $user->username;
// 	}
// }

// It will more simple in this way
// $users = DB::getInstance()->get('users', array('username', '=', 'alex'));
// Something like
// $users = DB::getInstance()->get('users', array('points', '>', '5'));
// if($users->count()) {
// 	foreach ($users as $user) {
// 		echo $user->username;
// 	}
// }

// We can do this but this massy what happens if we change the name like config
// $GLOBALS['config']['mysql']['host'];

// echo Config::get('mysql/host/hello'); // '127.0.0.1'
// Fatal error: Call to private DB::__construct() from invalid context
// $db = new DB();

// $db = new DB();
// $db = new DB();
// $db = new DB();
// $db = new DB();
// $db = new DB();

// DB::getInstance();
// DB::getInstance();
// DB::getInstance();
// DB::getInstance();
// DB::getInstance();

// $user = DB::getInstance()->query("SELECT username FROM users WHERE username = ?", array('alex'));
// $user = DB::getInstance()->get('users', array('username', '=', 'alex'));
// $user = DB::getInstance()->query("SELECT * FROM users");

$user = DB::getInstance()->update('users', 3, array(
	'password' => 'newPassword',
	'name'	   => 'Mainul Hasan'
));
// exit;
$user = DB::getInstance()->insert('users', array(
	'username' => 'Dale',
	'password' => 'password',
	'salt'	   => 'salt'
));

// exit;
// var_dump($user);

if(!$user->count()) {
	echo 'No user';
} else {
	// return the first element
	// echo $user->first()->username;
	// instead of using foreach loop
	// echo $user->results()[0]->username;
	// foreach($user->results() as $user) {
	// 	echo $user->username, '<br>';
	// }
	// var_dump($user->results());
	// echo 'OK!';
}
