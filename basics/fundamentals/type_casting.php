<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Type Juggling and Type Casting</title>
</head>
<body>
	Type Juggling<br/>
	<?php $count = "3"; ?>
	Type: <?php //echo gettype($count); ?><br/>

	<?php //$count += 3; //data type automatically changes from string to integer?>
	<?php $count = $count + '2 peoples'; //data type automatically changes from string to integer?>
	<?php echo $count;exit; ?>
	Type: <?php echo gettype($count); ?><br>

	<?php $cats = "I have" . $count . "cats.";////data type automatically changes from integer to string ?>
	Cats: <?php echo gettype($cats); ?><br>
	<br>

	<?php //Its not a best practice to depend on type juggling ?>
	
	Type Casting <br>
	<?php settype($count, "integer");//settype() convert the data type in place  ?>
	Count: <?php echo gettype($count); ?><br>

	<?php $count2 = (string) $count; ?>
	Count: <?php echo gettype($count); ?><br>
	Count2 <?php echo gettype($count2); ?><br>

	<br>
	<br>
	<?php $test1 = 3; ?>
	<?php $test2 = 3; ?>
	<?php settype($test1, "string"); ?>
	<?php (string) $test2;

	//Custome type is not convert the data type in place it is used if we assigned the conversion in a variable or used in a variable 
	//Its not a permanent conversion.
	
	?>
	test1: <?php echo gettype($test1); ?><br>
	test2: <?php echo gettype($test2); ?><br>


</body>
</html>