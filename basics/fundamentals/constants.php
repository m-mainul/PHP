<?php 
	$max_width = 980;

	define("MAX_WIDTH", $max_width);
	echo MAX_WIDTH;
?>
<br>
<?php 
 	// Syntax
	// define(name, value, case-insensitive)
 	//case-insensitive: Specifies whether the constant name should be case-insensitive. Default is false
 	//example: define("GREETING", "Welcome to W3Schools.com!", true);
 	//can't change the value
 	// MAX_WIDTH = MAX_WIDTH + 1;
 	// echo MAX_WIDTH;
 	// Constants are like variables but never change
 	// Constants are defined with the define() command
 	// as a convention, constants use UPPER_CASE
 	// Constants can be assigned any of the 4 basic data types
 	// Constants can be assigned to variables
 	// Constants can be echoed
	// Predefined constants are assigned when php is installed
 	//Unlike variables, constants are automatically global across the entire script.
 	//The example below uses a constant inside a function, even if it is defined outside the function:
 define("GREETING", "Welcome to W3Schools.com!");

 function myTest() {
 	echo GREETING;
 }

 myTest();
	// Some examples:

	 //version of PHP
	 //echo '<br /> Version: ';
	 echo "Current PHP Version you are using  : " . PHP_VERSION;

	 echo '<br /> End of Line: ';
	 echo PHP_EOL;

	 //maximum size of an integer
	 echo '<br /> Max Int: ';
	 echo PHP_INT_MAX;
	 echo PHP_EOL;

	 $reference = 'www.facebook.com';
	 echo "<br /><a href = '{$reference}'>More Info</a>";
	 ?>
	<br>
<?php 
	// The value of a magic constant is defined when our php program starts running
	// magic constants start and end with "__"
	//There are five magical constants that change depending on where they are used.
	//__LINE__ __FILE__ __FUNCTION__ __CLASS__ __METHOD__

	//some examples:

	//current filename
	echo "Your file name :" . __FILE__;

	echo '<br />';

	//current directory
	// allows you to write code which can be "moved" to another web server directory
	// makes your code more flexible and avoids "hard coding" directory path information

	echo __DIR__;

	echo '<br />';

	//The Current line number of the file.
	echo "The Line number : " . __LINE__;

	echo '<br />';

	//PHP_INT_MAX -- The PHP integer value limit
	echo "Integer Maximum Value : " . PHP_INT_MAX;

	echo '<br />';		 

	 ?>


<?php 

	//__FUNCTION__ return the function name
	//__CLASS__ return the class name
	//__METHOD__ return the method name

	class demo
	{
		function test()
		{
			echo "Function of demo class : ". __FUNCTION__ ."<br/>";
		}
		function testme()
		{
			echo "Method of demo class : ". __METHOD__ ."<br/>";
			echo "Class : ". __CLASS__;

		}
	}
	$object=new demo();
	$object->test();
	$object->testme();

?>

 <br>

 <?php //can't even redefine it
 define("MAX_WIDTH", 981);
 echo MAX_WIDTH;