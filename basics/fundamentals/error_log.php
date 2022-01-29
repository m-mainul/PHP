<?php 
	
	// Set error reporting.
	error_reporting(E_ALL);
	
	// Display errors.
	ini_set('display_errors',1);
	
	// Log errors.
	ini_set('log_errors',1);

	// No error log message max.
	ini_set('log_errors_max_len',0);

	// Specify the location of error log
	// Specify log file.
	ini_set('error_log','./error_log.txt');
	
	echo '<h1>Triggering notice</h1>';
	var_dump($error);
 ?>