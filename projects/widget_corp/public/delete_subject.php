<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?> 

<?php 
	$current_subject = find_subject_by_id($_GET["subject"], false);
	if(!$current_subject){
		//subject ID was missing or invalid or
		//subject couldn't found in database
		redirect_to("manage_content.php");
	}

	// There is a problem if we delete the subject what happen's of the pages.
	// We have two choices delete all page automatically when delete a subject 
	// or first delete all pages then the subject.
	// second one is more inconvenient but first one will better for more safety. 

	// Determine whether a subject has page or not 
	// If subject has page subject deletion will not possible
	$page_set = find_pages_for_subject($current_subject["id"]);
	if(mysqli_num_rows($page_set) > 0){
		$_SESSION["message"] = "Can't delete a subject with pages.";
		redirect_to("manage_content.php?subject={$current_subject["id"]}");
	}

	$id = $current_subject["id"];
	$query = "DELETE FROM subjects WHERE id = {$id} LIMIT 1";
	$result = mysqli_query($connection,$query);

	if($result && mysqli_affected_rows($connection) == 1){
		//Success
		$_SESSION["message"] = "Subject deleted";
		redirect_to("manage_content.php");
	}else{
		//Failure
		$_SESSION["message"] = "Subject deletion failed.";
		redirect_to("manage_content.php?subject={$id}");
	}
 ?>