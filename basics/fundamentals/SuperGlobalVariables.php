<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Superglobals variables</title>
</head>
<body>
	<?php 
		//Superglobals are built-in variables that are always available in all scopes.
		//Several predefined variables in PHP are "superglobals", which means that they are always accessible, regardless of scope - and you can access them from any function, class or file without having to do anything special.
		//The PHP superglobal variables are:   $GLOBALS, $_SERVER,$_REQUEST,$_POST,$_GET,$_FILES,$_ENV,$_COOKIE,$_SESSION
	?>


	<?php 
	 	/*$GLOBALS is a PHP super global variable which is used to access global variables from anywhere in the PHP script (also from within functions or methods).
		  PHP stores all global variables in an array called $GLOBALS[index]. The index holds the name of the variable.
		  The example below shows how to use the super global variable $GLOBALS:
 		*/

		  $x = 75;
		  $y = 25;

		  function addition() {
		  	$GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
		  }

		  addition();
		  echo $z; 

		  ?>

		  <br>

		  <?php 
	/*
	PHP $_SERVER
	$_SERVER is a PHP super global variable which holds information about headers, paths, and script locations.
	The example below shows how to use some of the elements in $_SERVER:
	*/

	echo $_SERVER['PHP_SELF'];
	echo "<br>";
	echo $_SERVER['SERVER_NAME'];
	echo "<br>";
	echo $_SERVER['HTTP_HOST'];
	echo "<br>";
	echo $_SERVER['HTTP_REFERER'];
	echo "<br>";
	echo $_SERVER['HTTP_USER_AGENT'];
	echo "<br>";
	echo $_SERVER['SCRIPT_NAME'];
	echo "<br>";
	echo $_SERVER['GATEWAY_INTERFACE'];
	echo "<br>";
	echo $_SERVER['SERVER_ADDR'];
	echo "<br>";
	echo $_SERVER['REQUEST_METHOD'];
	?>

	<?php 
	//PHP $_REQUEST
	//PHP $_REQUEST is used to collect data after submitting an HTML form.
	?>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		Name: <input type="text" name="fname">
		<input type="submit">
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
		$name = $_REQUEST['fname'];
		if (empty($name)) {
			echo "Name is empty";
		} else {
			echo $name;
		}
	}
	?>

	<br>
	
	<!-- PHP $_POST
	PHP $_POST is widely used to collect form data after submitting an HTML form with method="post". $_POST is also widely used to pass variables. -->

	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		Name: <input type="text" name="fname">
		<input type="submit">
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
		$name = $_POST['fname'];
		if (empty($name)) {
			echo "Name is empty";
		} else {
			echo $name;
		}
	}
	?>
<!-- 
	PHP $_GET
	    PHP $_GET can also be used to collect form data after submitting an HTML form with method="get".
	    $_GET can also collect data sent in the URL. -->

<!-- GET vs. POST
	- Both GET and POST create an array (e.g. array( key => value, key2 => value2, key3 => value3, ...)). This array holds key/value pairs, where keys are the names of the form controls and values are the input data from the user.
	- Both GET and POST are treated as $_GET and $_POST. These are superglobals, which means that they are always accessible, regardless of scope - and you can access them from any function, class or file without having to do anything special.
	- $_GET is an array of variables passed to the current script via the URL parameters.
	- $_POST is an array of variables passed to the current script via the HTTP POST method.
 -->
 <!-- Developers prefer POST for sending form data. -->
 </body>
</html>