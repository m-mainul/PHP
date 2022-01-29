<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Second Page</title>
</head>
<body>
	
	<pre>
		<?php
			//print_r($_GET);
			//$id = $_GET['id'];
			//echo $id; 
		 ?>
	</pre>

	<?php
		$id = $_GET['id'];
		echo $id;  
	 ?>

	 <br>

	 <?php
		$company = $_GET['company'];
		echo $company;  
	 ?>

</body>
</html>