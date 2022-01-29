<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Scope Rsolution Operator(::)</title>
</head>
<body>
	<!-- From outside the class definition -->
	<?php
	class MyClass {
	    const CONST_VALUE = 'A constant value';
	}

	$classname = 'MyClass';
	echo $classname::CONST_VALUE; //Example of assign a class to a variable and using these variable instead of class.
	echo MyClass::CONST_VALUE; //Use the class name because of referencing the constant from outside of the class definition
	?>

	<!-- from inside the class definition -->

	<?php
	class OtherClass extends MyClass
	{
	    public static $my_static = 'static var';

	    public static function doubleColon() {
	        echo parent::CONST_VALUE . "\n"; //calling from parent class
	        echo self::$my_static . "\n";   //calling form own class.
	    }
	}

	$classname = 'OtherClass';
	echo $classname::doubleColon(); // As of PHP 5.3.0

	OtherClass::doubleColon();
	?>


	
</body>
</html>