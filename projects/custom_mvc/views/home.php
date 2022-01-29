<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test Page</title>
</head>
<body>
	<?php 
		if(count($results) == 0) {
			echo "<p>There are currently no bolog posts in the database</p>";
		} else {
			foreach ($results as $row) {
				print_r($row);
			}
		}
	 ?>
</body>
</html>