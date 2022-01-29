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
			$menu_name = "Today's Widget Trivia";
			$position = (int) 4;
			$visible = (int) 1;

			//Escape all strings
			$menu_name = mysqli_real_escape_string($connection,$menu_name); //is designed for string.

		 	//2. Perform database query
		 	// $query = "INSERT INTO subjects (menu_name, position, visible)
		 	// 		  VALUES('{$menu_name}', {$position}, {visible})";
			$query  = "INSERT INTO subjects (";
			$query .= "menu_name, position, visible";
			$query .= ") VALUES (";
			$query .= " '{$menu_name}', {$position}, {$visible}";
			$query .= ")";

		 	#echo $query; exit;		  

		$result = mysqli_query($connection, $query);
		 	//Test if there was a query error
		if($result){
		 		//Success
		 		//redirect_to("Somepage.php");
			echo "Success!"; 
		}else{
		 			//Failure 
		 			//$message = "Subject creation failed";
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
			<?php 
		 	// Print auto-generated id
			echo "New record has id: " . mysqli_insert_id($connection); 
			?>
		</body>
		</html>

		<?php 
		 	// 5. Close database connection
		mysqli_close($connection);
		?> 