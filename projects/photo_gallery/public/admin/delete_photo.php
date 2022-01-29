<?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php 
	// must have an ID
	if(empty($_GET['id'])) {
		$session->message("No photograph ID was provided.");
		redirect_to('index.php');
	}

	$photo = Photograph::find_by_id($_GET['id']);
	// If find photo and is able to destroy()
	// Then give the message and redirect to list_photos.php 
	if($photo && $photo->destroy()) {
		// $session->message("The photo was deleted.");
		// Though db entry & file was deleted but still we get filename 
		// because filename is the attribute and it has value
		//until the php dispose the object end of the script
		$session->message("The photo {$photo->filename} was deleted."); 
		redirect_to('list_photos.php');
	} else {
		$session->message("The photo could not be deleted.");
		redirect_to('list_photos.php');
	}
?>
<!-- Close is done automatically but it's good practice to close the connection -->
<?php if(isset($database)) { $database->close_connection(); } ?> 