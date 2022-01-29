<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Functions: Multiple Returns</title>
</head>
<body>
	<?php 

		function add_subt($val1, $val2)
		{
			$add = $val1 + $val2;
			$subt = $val1 - $val2;
			$multiply = $val1 * $val2;
			return array($add,$subt,$multiply); //Array is used to return multiple values
		}
		// Retrieve the multiple return values using the array as follows:
		$result_array = add_subt(10,5);
		echo "Add: " . $result_array[0] . "<br />";
		echo "Subt: " .$result_array[1]  . "<br/>";
		echo "Multiply: " .$result_array[2]  . "<br/>";

		// Another way is using list function
		// List is used to assign array value in variale
		// Which is more useable than using array in the above
		// It is good sense to pack the variable using array and unpack using list function
		list($add_result, $subt_result,$multiply) = add_subt(20,7);//list is the powerful tool to pack a variable and immediately unpack the variable.
		echo "Add: " . $add_result . "<br />";
		echo "Subt: " . $subt_result . "<br />";
		echo "Multiply: " . $multiply . "<br />";
	 ?>

<!-- 	 <pre>
	<?php 
		print_r($result_array);
	 ?>
</pre> -->
</body>
</html>