<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Array Functions</title>
</head>
<body>

<!-- <?php $myArray = ['1' => '12',['name' => 'Mainul'],3,34,6]; ?>
	<?php //php automatically convert a string into integer value like in this php script will convert '12' into integer number ?>
	<pre>
		<?php print_r($myArray); ?>
	</pre>
	<?php echo $myArray[2]['name']; ?> -->

<?php 

	$numbers = array(1,3,4,5,45,2,345);
	echo $numbers[0]; 
?>

<!-- Count return length of the array -->
Count: 	   <?php echo count($numbers); ?><br/> 
Max value: <?php echo max($numbers); ?><br/>
Min value: <?php echo min($numbers); ?><br/>

<br/>

<pre>
Sort: 			<?php sort($numbers);  print_r($numbers); //Sort()Sort the array in ascending order?><br/>
Reverse sort: 	<?php rsort($numbers); print_r($numbers); //Rsort()Sort the array in descending order?><br/>
</pre>

<br/>

<pre>
	Sort Associative Arrays in Ascending Order: <?php $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43"); asort($age); print_r($age); //sort associative arrays in ascending order, according to the value?> <br>
	Sort Associative Arrays in Ascending Order: <?php $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43"); ksort($age); print_r($age); //sort associative arrays in ascending order, according to the key?> <br>
	Sort Associative Arrays in Descending Order: <?php $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43"); arsort($age); print_r($age); //sort associative arrays in descending order, according to the value?> <br>
	Sort Associative Arrays in Descending Order: <?php $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43"); krsort($age); print_r($age); //sort associative arrays in descending order, according to the key?> <br>
</pre>

Implode:<?php   
//implode turn an array into string In other words combined values together to get a string
echo $num_string = implode(" * ", $numbers);
?>

<br/>

Explode: <?php print_r(explode(" * ", $num_string)); 
//Explode() takes a string every time it takes the user divider as a new object in array
//Explode split the string in divider place the object as a new element in array
//Explode is extremly useful in comma separtor list ?>
<br/>
<!-- in_array()-- determines whether a element is present in array or not.  -->
5 in array?: 	<?php echo in_array(5, $numbers);//returns T/F ?><br/>
19in array?:    <?php echo in_array(19, $numbers); //returns T/F?><br/>

</body>
</html>