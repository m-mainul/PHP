<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Logical Operators</title>
</head>
<body>
	<?php 
	 $e = 100;
	 if (!isset($e)) {
	 	$e = 200;
	 }
	 echo $e;
	 ?>
	 <br>
	 <?php 
	 	//don't reject 0 or 0.0
	 	$qunatity = "";
	 	if (empty($qunatity) && !is_numeric($qunatity)) {
	 		echo "You must enter a qunatity.";
	 	}
	  ?>
</body>
</html>