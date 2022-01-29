<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reference Assignment</title>
</head>
<body>
	<?php
		$a = 1;
		$b = $a;
		$b = 2;
		echo "a:{$a} / b: {$b}<br />";
		//returns 1/2

		$a = 1;
		$b =& $a; // b points to the a //$a and $b point to the same content. 
				 //$a and $b are completely equal here. 
				//$a is not pointing to $b or vice versa. 
			   //$a and $b are pointing to the same place. 
		$b = 2;	 //  they both contain the same thing
		echo "a:{$a} / b: {$b}<br />"; 
		//returns 2/2
	?>
</body>
</html>