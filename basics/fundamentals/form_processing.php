<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form Processing</title>
</head>
<body>
	<pre>
		<?php 
			//print_r($_POST);
		 ?>
	</pre>
	<?php 
		//isset() is used to determine whether a variable is set or not.
		if (isset($_POST["userName"])) {
			$username = $_POST["userName"];
		}else{
			$username = "";
		}
		if (isset($_POST["password"])) {
			$password = $_POST["password"];
		}else{
			$password = "";
		}
	?>

	<?php
		//set default values using ternary operator 
	   //boolean_test ? value_if_true : value_if_false
		$username = isset($_POST['userName']) ? $_POST['userName'] : "";
		$password = isset($_POST['password']) ? $_POST['password'] : "";
	 ?>
	 
	<?php	
		echo "{$username}: {$password}";
	 ?>
</body>
</html>