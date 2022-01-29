<?php 
	
	
	
	// Set error reporting.
	error_reporting(E_ALL | E_STRICT | E_ERROR);
	
	// Display errors.
	ini_set('display_errors',1);

	// E_ERROR example - run out of memory.
	// This fatal run time error and that can't be recover, halting script execution and resuling in a crash
	// set memory limit 1K
	// ini_set('memory_limit','1K');
	// var_dump((object) range(0,1000));

	// E_PARSE error - bad syntax. 
	if(TRUE){
		echo 'fail';
	}

	// E_WARNING - a non-fatal problem
	// E_NOTICE - typically accessing something undefined.
	// var_dump($array);
	// $array = array();
	// var_dump($array[0]);
	// $object = new stdClass();
	// var_dump($object->property);

	// If we execute above code we get three notices
	// To avoid notices we modify the code as like
	$array = array();
	var_dump($array);
	// isset is a convenient function to identify whether a variable is set or not
	if(isset($array[0])){
		var_dump($array[0]);
	}
	$object = new stdClass();
	if(isset($object->property)){
		var_dump($object->property);
	}

	// E_STRICT - inforces to best practices and intend to prevent sloppy programming
	// E_STRICT - mixing scopes.
	class Strict {
		static function trigger() {
			echo "Triggered";
		}
	}

	Strict::trigger();

	// E_DEPRECATED - something will be removed soon.
	// -- New object by reference.
	// $deprecated = & new stdClass();
	$deprecated =  new stdClass();
	var_dump($deprecated);
	// -- Split function
	// var_dump(split(',','one,two,three')); 
	var_dump(explode(',','one,two,three')); 

	// User defined error
	trigger_error('Custom notice',E_USER_NOTICE);
	trigger_error('Custom warning',E_USER_WARNING);
	trigger_error('Custom error',E_USER_ERROR);
	echo 'will not execute';

?>