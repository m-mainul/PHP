<?php 
	session_start();
	session_destroy();
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Sessions Demo</title>
 </head>
 <body>
 	<p>Pageviews: <?php echo $_SESSION['views']; ?></p>
 </body>
 </html>