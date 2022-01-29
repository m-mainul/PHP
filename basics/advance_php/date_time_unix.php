<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dates and Times: Unix</title>
</head>
<body>
	<?php
		 echo time();
		 echo "<br />";
		 echo mktime(2,30,45,10,1,2009);
		 echo "<br />";	
		 // checkdate()
		 echo checkdate(12,31,2000) ? 'true' : 'false';
		 echo "<br />";
		 echo checkdate(2,31,2000) ? 'true' : 'false';
		 echo "<br />";

		 $unix_timestamp = strtotime("now");
		 echo $unix_timestamp . "<br />";

		 $unix_timestamp = strtotime("15 September 2004");
		 echo $unix_timestamp . "<br />";	
		 $unix_timestamp = strtotime("15 September, 2004");
		 echo $unix_timestamp . "<br />";	
		 $unix_timestamp = strtotime("+1 day");
		 echo $unix_timestamp . "<br />";	
		 $unix_timestamp = strtotime("last Monday");
		 echo $unix_timestamp . "<br />";		 
	 ?>
</body>
</html>