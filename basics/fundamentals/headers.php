<?php 
	header("HTTP 1.1/404 Not Found");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Headers</title>
</head>
<body>
	<?php 
		//This won't work... unless you have output
		//buffering turned on.
		//header("HTTP 1.1/404 Not Found");
	 ?>

	 <pre>
	 	<?php 
	 	  print_r(headers_list());
	 	 ?>
	 </pre>
</body>
</html>