<?php 
//This is good practice to use constant instead of variable in the case of database connection.
define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","alquran");

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	//Test if connection occured error
if (mysqli_connect_errno()) {
	die("Databse connection failed: " .
		mysqli_connect_error() .
		"(" . mysqli_connect_errno() . ")" 
		);
}
?>