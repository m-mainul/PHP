  <?php 
	session_start(); //Initialize the session

	if (isset($_SESSION['views'])) {
		$_SESSION['views'] = $_SESSION['views'] + 1;
	}else{
		$_SESSION['views'] = 1;
	}
 ?>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Sessions Demo</title>
 </head>
 <body>
 <p>Pageviews: <?php echo $_SESSION['views']; ?></p>
 </body>
 </html>