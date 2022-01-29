<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Functions: Default arguments values.</title>
</head>
<body>
	<?php 
		function paint($room="office",$color="red")
		{
			return "The color of the {$room} is {$color}.<br/>";
		}

		echo paint();
		echo paint("bedroom", "blue");
		echo paint("bedroom", null);

	 ?>
</body>
</html>