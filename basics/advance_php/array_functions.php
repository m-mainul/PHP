<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Array Functions</title>
</head>
<body>
	<?php 
	// Most useful array functions at a glimpse

		// Sizeof()
		// This function returns the number of elements in an array.
		// Use this function to find out how many elements an array contains; 
		// this information is most commonly used to initialize a loop counter when processing the array.
		$number_array = [1,2,3,4,5,6];
		echo sizeof($number_array);

		echo "<br />";

		// array_values();
		// This function accepts a PHP array and returns a new array containing only its values (not its keys). 
		// Its counterpart is the array_keys() function.
		// Use this function to retrieve all the values from an associative array.
		// Returns an indexed array of values. 
		$data = array("hero" => "Holmes", "villain" => "Moriarty");
		print_r(array_values($data));

		echo "<br />";

		// array_keys()
		// This function accepts a PHP array and returns a new array containing only its keys (not its values). 
		// Its counterpart is the array_values() function.
		// Use this function to retrieve all the keys from an associative array.
		echo "Array Keys"."<hr>";
		$data = array("hero" => "Holmes", "villain" => "Moriarty");
		print_r(array_keys($data));

		$numbers = array(1,2,3,4,5,6);
		echo "<pre>";
		print_r($numbers);
		echo "</pre>";
		echo "<br /><br />";

	// shifts first element out of an array
		// and returns it.
		$a = array_shift($numbers);
		echo "a:".$a."<br />";
		echo "<pre>";
		print_r($numbers);
		echo "</pre>";
		echo "<br /><br />";

		// This function adds an element to the beginning of an array.
		// returns the element count.
		$b = array_unshift($numbers, 'first');
		echo "b:".$b."<br />";
		print_r($numbers);
		echo "<br /><br />";

		//pops last element out of an array
		//and returns it.
		$a = array_pop($numbers);
		echo "a:".$a."<br />";
		print_r($numbers);
		echo "<br /><br />";

		//pushes an element onto the end of an array,
		//returns the element count.
		$b = array_push($numbers, 'last');
		echo "b:".$b."<br />";
		print_r($numbers);
		echo "<br /><br />";

		// each()
		// This function is most often used to iteratively traverse an array. 
		// Each time each() is called, it returns the current key-value pair and moves the array cursor forward one element. 
		// This makes it most suitable for use in a loop.
		$data = array("hero" => "Holmes", "villain" => "Moriarty");
		while (list($key, $value) = each($data)) {
			echo "$key: $value \n";
		}

		echo "<br /><br />";

		// sort()
		// This function sorts the elements of an array in ascending order. 
		// String values will be arranged in ascending alphabetical order. 
		// Note: Other sorting functions include asort(), arsort(), ksort(), krsort() and rsort().
		$data = array("g", "t", "a", "s");
		sort($data);
		print_r($data);

		echo "<br /><br />";

		// array_flip()
		// array_flip — Exchanges all keys with their associated values in an array
		// Use this function if you have a tabular (rows and columns) structure in an array, 
		// and you want to interchange the rows and columns.
		$data = array("a" => "apple", "b" => "ball");
		print_r(array_flip($data));

		echo "<br /><br />";

		// array_reverse()
		// array_reverse — Return an array with elements in reverse order
		// Use this function to re-order a sorted list of values in reverse for easier processing—for example, 
		// when you're trying to begin with the minimum or maximum of a set of ordered values.
		$data = array(10, 70, 25, 60);
		print_r(array_reverse($data));

		echo "<br /><br />";

		// array_merge()
		// array_merge — Merge one or more arrays
		// This function merges two or more arrays to create a single composite array. 
		// Key collisions are resolved in favor of the latest entry.
		// Use this function when you need to combine data from two or more arrays into a single structure—
		// for example, records from two different SQL queries.
		$data1 = array("cat", "goat");
		$data2 = array("dog", "cow");
		print_r(array_merge($data1, $data2));

		echo "<br /><br />";

		// Return an array of random keys
		// Structure - array_rand(array,number) 
		// array_rand() — Pick one or more random entries out of an array
		// Use this function when you need to randomly select from a collection of discrete values—
		// for example, picking a random color from a list.
		$data = array("white", "black", "red");
		echo "Today's color is " . $data[array_rand($data)];

		$input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
		$rand_keys = array_rand($input, 2);
		echo $input[$rand_keys[0]] . "\n";
		echo $input[$rand_keys[1]] . "\n";

		echo "<br /><br />";

		// array_search($search, $arr)
		// array_search — Searches the array for a given value and returns the corresponding key if successful
		// This function searches the values in an array for a match to the search term, and returns the corresponding key if found. 
		// If more than one match exists, the key of the first matching value is returned.
		// Use this function to scan a set of index-value pairs for matches, and return the matching index.
		$data = array("blue" => "#0000cc", "black" => "#000000", "green" => "#00ff00");
		echo "Found " . array_search("#0000cc", $data);

		echo "<br /><br />";

		// array_slice($arr, $offset, $length)
		// This function is useful to extract a subset of the elements of an array, as another array. Extracting begins from array offset $offset and continues until the array slice is $length elements long.
		// Use this function to break a larger array into smaller ones—for example, when segmenting an array by size ("chunking") or type of data.
		$data = array("vanilla", "strawberry", "mango", "peaches");
		print_r(array_slice($data, 1, 2));

		echo "<br /><br />";

		// array_unique($data)
		// This function strips an array of duplicate values.
		// Use this function when you need to remove non-unique elements from an array—for example, when creating an array to hold values for a table's primary key.
		$data = array(1,1,4,6,6,7,4);
		print_r(array_unique($data));

		echo "<br /><br />";

		// array_walk()
		// Run each array element in a user-defined function
		// function myfunction($value,$key)
		// This function "walks" through an array, applying a user-defined function to every element. 
		// It returns the changed array.
		// Use this function if you need to perform custom processing on every element of an array—for example, reducing a number series by 10%.
		function reduceBy10(&$val, $key) {
			$val -= $val * 0.1;
		}

		$data = array(10,20,30,40);
		array_walk($data, 'reduceBy10');
		print_r($data);

		echo "<br /><br />";

		// is_array()
		// It returns true if the argument is an array otherwise returns false.
		$argument = array('value1','value2');
		if(is_array($argument)){	
			echo 'array';
		} else {
			echo 'Not an array';
		}

		 // in_array()
		// in_array($search_value,$array,mode);
		// In array function check the search value in an array. Returns true if it present otherwise false.
		$array_val = array('12', '5', '6', '4'); 
		if(in_array(4,$array_val)){
			echo 'value found in an array'; 
		}

		// list() function
		// list() function is very useful when you want to assign an array items to variables.
		$value = array('php','javascript','python');
		list($first_value,$second_value,$third_value) = $value;
		// when you echo the individual variables
		echo $first_value;         // output - php
		echo $second_value;        // output - javascript 
		echo $third_value;         // output - python


		// array_key_exists — Checks if the given key or index exists in the array
		$a=array("Volvo"=>"XC90","BMW"=>"X5");
		if (array_key_exists("Volvo",$a))
		  {
		  	echo "Key exists!";
		  }
		else
		  {
		  	echo "Key does not exist!";
		  }

	 ?>

	 <?php 
	 	// explode() - This function breaks the string into array on the basis of delimiter passed.
	 	// syntax : explode(delimeter,string,limit)
	 	// Explanation:
	 	// Delimeter: It is mandatory field. It specifies where to break the string.
	 	// String: It is mandatory. It specifies the string to split.
	 	// Limit : It is optional. It specifies the maximum number of array elements to return.
	 	
	 	$str = "Hello world. It's a beautiful day.";
	 	 print_r (explode(" ",$str));
	 ?>

	 <br>

	 <?php 
	 	// implode()
	 	// This function join array elements with a string on the basis of delimiter passed.
	 	// syntax: implode(delim,array)
	 	// Explanation:
	 	// Delimiter: It is mandatory field. It specifies what to put between the array elements. Default is “” (an empty string).
	 	// Array: It is mandatory field. It specifies the array to join to a string.
	 	 $arr = array('Hello','World!','Beautiful','Day!');
	 	 echo implode(" ",$arr);
	 ?>
</body>
</html>