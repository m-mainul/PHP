<?php 
	//Steps 4 is important when we want to read data from databases
	//1. Create a database connection
	$dbhost = "localhost"; //that could be an ip address or domain name like lynda.com
	$dbuser = "widget_cms";
	$dbpass = "secretpassword";
	$dbname = "widget_corp";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	//Test if connection occured
	if (mysqli_connect_errno()) { //determines error no; errono() is equal to the error no or either is 0
		die("Databse connection failed: " .
			mysqli_connect_error() .//determine actual error //retuns empty string if there is not a problem
			"(" . mysqli_connect_errno() . ")" //determine error no.
		);
	}
 ?>
 <?php 
 	//2. Perform database query
 	$query  = "SELECT * ";  //always define a query in a seperate variable like that here we use the variable name $query. 
 	$query .= "FROM subjects "; //space is so important after each condition of the query otherwise query will be mismatched. 
 	$query .= "WHERE visible = 1 ";
 	$query .= "ORDER BY position ASC";
 
 	$result = mysqli_query($connection, $query); // result is a special thing it not just an array that come back to us its going to be special kind of object called resource
 												//Resource is collection of database rows that we can need to access	
 	//Test if there was a query error
 	if(!$result){
 			die("Database query failed."); //before we access the database we need to test the query is succeed or not.
 										  //if there is no result that means something wrong in the database query. 
 		}
  ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Databases</title>
 </head>
 <body>
 	<ul>
 	<?php 
 		//3. Use returned data (if any)
 		while ($row = mysqli_fetch_array($result)) { //fetching the row incrementing the array pointer for us php doesn't have to ability to increment the array pointer

 			//output data from each row
 			var_dump($row);
 			echo "<hr/>";
 		}
 		// die();
 		#while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
 		while($subject = mysqli_fetch_assoc($result)){ //use 
 			//output data from each row
 	?>
 	<li><?php echo $subject["menu_name"]; ?></li>
 	<?php
 		}
 	 ?>
 	 </ul>
 	 <?php 
 	 	//4. Release returned data
 	 	mysqli_free_result($result);
 	  ?>
 </body>
 </html>

 <?php 
 	// 5. Close database connection
 	mysqli_close($connection);
  ?> 