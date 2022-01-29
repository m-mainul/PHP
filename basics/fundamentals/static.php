<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Static Variable</title>
</head>
<body>
	<?php 
		 // A static variable exists only in a local function scope, but it does not lose its value when program execution leaves this scope.
		 
		 function test()
		 {
		     $a = 0;
		     echo $a."<br/>";
		     $a++;
		 }

		 test();
		 test();
		 test();

		 //The function is quite because every time it will print 0 never increment the value of the a.

		 function test_me()
		 {
		     static $a = 0;
		     echo $a."<br/>";
		     $a++;
		 }
		 
		 test_me();
		 test_me();
		 test_me();

		 //This function is more useful because first time it will 
		 // initialize the value of the a and others time it will print with incremented value of the a 

		 static $int = 0;          // correct 
		 // static $int = 1+2;        // wrong  (as it is an expression)
		 // static $int = sqrt(121);  // wrong  (as it is an expression too)

	 ?>
</body>
</html>