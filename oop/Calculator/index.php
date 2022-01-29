<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php
		require_once ("Calculator.php");
		$a_calculator = new Calculator(10,35);
		echo "The sum of {$a_calculator->get_first_no()} and {$a_calculator->get_second_no()} is: ".$a_calculator->add().'<br />';
		echo "The subtraction of {$a_calculator->get_first_no()} and {$a_calculator->get_second_no()} is: ".$a_calculator->subtract().'<br />';
		echo "The divide of {$a_calculator->get_first_no()} and {$a_calculator->get_second_no()} is: ".$a_calculator->divide().'<br />';
 	?>
</body>
</html>