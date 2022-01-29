<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Debugging and TroubleShooting</title>
</head>
<body>
	
	<?php 
		// Debugging ways
		echo $variable; 	// variable value
		print_r($array);	// print readable array
		gettype($variable);	// variable type
		var_dump($variable);// variable type and value
		get_defined_vars();	// array of defined variables
		debug_backtrace();	// show backtrace
	 ?> 



	<?php 
		$number = 99;
		$string = "Bug?";
		$array = array(1=> "Homepage", 2=>  "About Us", 3=>"Services");
		//var_dump($array);
		//var_dump($number); //var_dump return variable type and value
		//var_dump($string);

	 ?>
	 <pre>
	    <?php var_export($array); ?>
	 </pre>

	 <pre>
	 	<?php 
	 		var_dump($array);
	 	 ?>
	 </pre>

	 <br>
<pre>
	<?php 
		print_r(get_defined_vars());//return the array of defined variables.
	 ?>
</pre>  
	
<!-- 	<?php 
 	print_r(get_defined_vars());
 ?> -->

 <?php 
 	// A backtrace is a summary of how your program got where it is. 
 	// It shows one line per frame, for many frames, starting with the currently executing frame (frame zero), 
 	// followed by its caller (frame one), and on up the stack.
 	// The debug_backtrace() function generates a PHP backtrace.
 	// This function displays data from the code that led up to the debug_backtrace() function.
 	// Returns an array of associative arrays. The possible returned elements are

 	// The possible returned elements are: 
 	// Name 	 Type 	    Description
 	// function string 	The current function name
 	// line 	 integer 	The current line number
 	// file 	 string 	The current file name
 	// class 	 string 	The current class name
 	// object 	 object 	The current object
 	// type 	 string 	The current call type. Possible calls:

 	//     Returns: "->"  - Method call
 	//     Returns: "::"  - Static method call
 	//     Returns nothing - Function call

 	// args 	array 	If inside a function, it lists the functions arguments. If inside an included file, it lists the included file names 

 	function say_hello_to($word) {
 		echo "Hello {$word}";
 		var_dump(debug_backtrace());
 	}

 	say_hello_to('Everyone');
  ?>

  <?php 

	// Pass Boolean TRUE to the print_r
  	// The only difference is that instead of using print_r() to output to the page, we pass the Boolean “True” argument, 
  	// which suppresses output at the same time that the value of $a is assigned to $b, and then we echo $b.
	$a = array( "Drink"=> "Soda", "Candy"=>"Chicklets",
	         "Foods"=>array("Rice", "Bread", "Meat",
	         "Fruits"=>array("Red"=>"Strawberry","Yellow"=>"Banana","Blue"=>"Grapes")),
	         "Music Styles"=>array("Soft"=>"Jazz", "Heavy"=>"Rock", "Soulful"=>"Blues"));
	echo "<pre>";
	$b = print_r($a,True);
	echo $b;
	echo "</pre>";

	// var_export() is very much like print_r(), except that what it returns is actually valid PHP code.
	$a = array( "Drink"=> "Soda", "Candy"=>"Chicklets",
	            "Foods"=>array("Rice", "Bread", "Meat",
	            "Fruits"=>array("Red"=>"Strawberry","Yellow"=>"Banana","Blue"=>"Grapes")),
	            "Music Styles"=>array("Soft"=>"Jazz", "Heavy"=>"Rock", "Soulful"=>"Blues"));
	echo "<pre>";
	var_export($a);
	echo "</pre>";


	$a = array(
	"Drink"=> "Soda",
	"Candy"=>"Chicklets",
	"Foods"=>array(
	     "Rice",
	     "Bread",
	     "Meat",
	     "Fruits"=>array(       
	           "Red"=>"Strawberry",
	           "Yellow"=>"Banana",
	           "Blue"=>"Grapes")
	            ),
	     "Music Styles"=>array(
	                   "Soft"=>"Jazz",
	                    "Heavy"=>"Rock",
	                    "Soulful"=>"Blues"));
	echo "<pre>";
	var_dump($a);
	echo "</pre>";
	 

  ?>

</body>
</html>