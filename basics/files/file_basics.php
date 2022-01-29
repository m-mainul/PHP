<?php 
	
	// print full path of the file.
	echo __FILE__."<br />"; 

	// Return the line numbers
	// be careful once we include files
	echo __LINE__."<br />"; 
	
	// Return the directory of the file 
	// both magic constants work as same
	echo dirname(__FILE__)."<br />";
	echo __DIR__ ."<br />"; // available from php 5.3 

	// Does file exists or not
	echo file_exists(__FILE__) ? 'yes' : 'no';
	echo "<br />";
	echo file_exists(__DIR__."/file_changer.php") ? 'yes' : 'no';
	echo "<br />";

	//exit;

	// Determine whether it is file or not.
	// is_file() - Tells whether the filename is a regular file
	echo is_file(__DIR__."/cloning.php") ? 'yes' : 'no';
	echo "<br />";
	echo is_file(__DIR__) ? 'yes' : 'no';
	echo "<br />";

	// Is it directory or not?
	// is_dir — Tells whether the filename is a directory
	echo is_dir(__DIR__."/cloning.php") ? 'yes' : 'no';
	echo "<br />";
	echo is_dir(__DIR__) ? 'yes' : 'no';
	echo "<br />";
	echo is_dir('..') ? 'yes' : 'no';
	echo "<br />";

	// Before writing in a file it might be useful to check whether file is exists or not 
	// or before read a file we make sure that file is exists or not

 ?>	