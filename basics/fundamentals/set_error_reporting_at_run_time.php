<?php 
	
	// Set error reporting.
	error_reporting(E_ALL);
	// Do not display errors.
	// ini_set() is used for setting either a error is seen or not.
	// to see error set display_errors 1
	// ini_set('display_errors',0);
	// error;
	// exit;

	// There are two fuctions to interact with the php cinfiguration options
	// ini_get() & ini_set()
	// ini_get() - returns the value currently stored for given configuration options	

	echo '<h1> display errors: before</h1>';
	var_dump(ini_get('display_errors'));

	echo '<h1>Triggering notice</h1>';
	var_dump($error);

	// ini_set override the previous setting
	echo '<h1>Setting errors</h1>';
	ini_set('display_errors',0);

	echo '<h1> display errors: after</h1>';
	var_dump(ini_get('display_errors'));

	echo '<h1>Triggering notice</h1>';
	var_dump($error);