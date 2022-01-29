<?php 
	//1. Create a database connection
	$dbhost = "localhost";
	$dbuser = "widget_cms";
	$dbpass = "secretpassword";
	$dbname = "widget_corp";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	//Test if connection occured
	if (mysqli_connect_errno()) { //determines error no; errono() is equal to the error no or either is 0
		die("Databse connection failed: " .
			mysqli_connect_error() .//determine actual error //retruns empty string if there is not a problem
			"(" . mysqli_connect_errno() . ")" //determine error no.
		);
	}
 ?>
 <?php 
 	//Often are form values in $_POST
 	$id = 5;

 	//2. Perform database query
 	// $query = "INSERT INTO subjects (menu_name, position, visible)
 	// 		  VALUES('{$menu_name}', {$position}, {visible})";
 	$query  = "DELETE FROM subjects ";
 	$query .= "WHERE id = {$id} ";
 	$query .= "LIMIT 1"; //it is good practice using limit in the case of delete operation for safety because delete only one.

 	//echo $query; exit;		  

 	$result = mysqli_query($connection, $query);
 	//Test if there was a query error
 	if($result && mysqli_affected_rows($connection) == 1){//that means if the condition is true then id must be in the database. if 
 															//we update multiple records at a time then we use
														//mysqli_affected_rows($connection) > 0. 
 		//Success
 		//redirect_to("Somepage.php");
 		echo "Success!"; 
 	}else{
 			//Failure 
 			//$message = "Subject delete failed";
 			die("Database query failed. " .mysqli_error($connection));
 			//mysqli_error($connection) that means find out the most recent error.
 		}
  ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Databases</title>
 </head>
 <body>
 	
 </body>
 </html>

 <?php 
 	// 5. Close database connection
 	mysqli_close($connection);
  ?> 