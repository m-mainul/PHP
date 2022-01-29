<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php 
	//can't add a new page unless we hava a subject as a parent!
	if(!$current_subject) { //because i use subject id in the query string so we get 
		// subject ID was missing or invalid or
	   //  subject couldn't be found in database
	   redirect_to("manage_content.php");
	}
 ?>

<?php
	if(isset($_POST['submit'])){
		//Process the form
		$subject_id =  $_POST["subject_id"];
		$menu_name = mysql_prep($_POST["menu_name"]);
		$position = (int) $_POST["position"];
		$visible = (int) $_POST["visible"];
		$content = mysql_prep($_POST["content"]);

		//validations
		$required_fields = array("menu_name","position","visible");
		validate_presences($required_fields);

		$fields_with_max_lengths = array("menu_name" => 30);
		validate_max_lengths($fields_with_max_lengths);

		if(!empty($errors)){
			$_SESSION["errors"] = $errors;
			redirect_to("new_page.php");
		}

		$query  = "INSERT INTO pages (";
		$query .= "subject_id, menu_name, position, visible, content";
		$query .= ") VALUES (";
		$query .= " {$subject_id}, '{$menu_name}', {$position}, {$visible}, '{$content}'";
		$query .= ")";	  
		$result = mysqli_query($connection, $query);
		//echo $query; exit;
		if($result){
		 	//Success
		 	$_SESSION["message"] = "page created";
		 	redirect_to("manage_content.php?subject={$subject_id}");
		 	// redirect_to("manage_content.php?subject = {$subject_id}");//never use space between query string variable and = sign.
		} else {
			//Failure
			$_SESSION["message"] = "page creation failed.";
			redirect_to("new_page.php");
		}

	} else {
		//This is probably a GET request
		redirect_to("new_page.php");
	}
 ?>

<?php if (isset($connection)) { mysqli_close($connection); }?> 