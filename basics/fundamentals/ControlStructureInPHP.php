<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Operators</title>
</head>
<body>
	<?php
	$x = 10;
	$y = 6;
	echo $x*$y;
	?> 

	<br>

	<?php
	$a = 5;
	if ($a == 5):
		echo "a equals 5";
	echo "...";
	elseif ($a == 6):
		echo "a equals 6";
	echo "!!!";
	else:
		echo "a is neither 5 nor 6";
	endif;
	?> 

	<br>

	<?php
	$a = 5;
	if ($a == 5){
		echo "a equals 5";
		echo "...";
	}
	
	elseif ($a == 6){
		echo "a equals 6";
		echo "!!!";
	}

	else{
		echo "a is neither 5 nor 6";
	}
	
	?>    
</body>
</html>