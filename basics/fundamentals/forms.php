<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form</title>
</head>
<body>
<!-- 
<?php 

	$num = 1;
	$num1 = 2;
	echo "3 house+" + $num1;
 ?>
-->
<form action="form_processing.php" method = "post">
	Username:<input type="text" name="userName" value=""><br>
	Password:<input type="password" name="password" value=""><br>
	<br>
	<input type="submit" name="submit" value="Submit!">
</form>
</body>
</html>