<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Integers</title>
</head>
<body>
	Absolute Value: <?php echo abs(0-300); //retrun the absolute value?><br/>
	Exponential:    <?php echo pow(2, 3); //retrun the final value using base and power?><br/>
	Square root: <?php echo sqrt(100); //retrun the square root of the number?><br/>
	Modulo: <?php echo fmod(20, 7); //return the modulus of the number?><br/>
	Random: <?php echo rand(); //generate a random number?><br/>
	Random (min,max): <?php echo rand(1,10); //generate a random number between the range of the minumum and maxmimum value includeing minimum and maximum value?><br/>
	<br/>
	<?php $var2 = 4; ?> 
	//concatenate a variable with assignment operator
	+= : <?php $var2 +=4; echo $var2; ?><br/>
	-= : <?php $var2 -=4; echo $var2; ?><br/>
	*= : <?php $var2 *=4; echo $var2; ?><br/>
	/= : <?php $var2 /=4; echo $var2; ?><br/>
	<br/>
	<?php 
		echo "1 houses" + "6 houses";
	 ?>
</body>
</html>