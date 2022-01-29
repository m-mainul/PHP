<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 

	/*It is not necessary to initialize variables in PHP however it is a very good practice. 
	Uninitialized variables have a default value of their type depending on the context in which they are used - 
	booleans default to FALSE, integers and floats default to zero, strings (e.g. used in echo) are set as an empty string and arrays become to an empty array. 
*/
		$a = $b = $c = 30; //one line declaration of the variable.
		echo $c;

		echo "<br/>";
		$var1 = 10;
		echo $var1;

		echo "<br/>";

		$var1 = 20;
		echo $var1;

		echo "<br/>";

		//Use the backslash "\" to "escape" special characters 
		$stringValue = 'This is a string, isn\'t?';
		echo $stringValue;

		echo "<br/>";

		$greeting = "Hello";
		$target = "World";
		$phrase = $greeting. " " . $target;
		echo "{$phrase}Again";

 ?>
</body>
</html>