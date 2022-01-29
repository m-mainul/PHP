<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Switch</title>
</head>
<body>
	<?php //case with multiple values

		$user_type = 'customer';

		switch ($user_type) {
			case 'student':
				echo "Welcome!";
				break;
			case 'press':
			case 'customer':
			case 'admin':
				echo "Hello!";
				break;
			default:
				# code...
				break;
		}
	 ?>
</body>
</html>