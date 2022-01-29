<?php 
	// Sessions use cookies which use headers.
	// Headers come before any html.
	// Must start before any HTML output
	// unless output buffering is turned on.
	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sessions</title>
</head>
<body>
	<?php 
		$_SESSION["first_name"] = "kevin";
		$name = $_SESSION["first_name"];
		echo $name;
	 ?>
</body>
</html>