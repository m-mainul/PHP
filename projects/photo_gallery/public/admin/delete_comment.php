<?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php 
	// must have an ID
	if(empty($_GET['comment_id'])) {
		$session->message("No comment ID was provided.");
		redirect_to('index.php');
	}

	$comment = Comment::find_by_id($_GET['comment_id']);
	// If find comment and is able to destroy()
	// Then give the message and redirect to list_comments.php 
	if($comment && $comment->delete()) {
		// $session->message("The comment was deleted.");
		// Though db entry & file was deleted but still we get filename 
		// because filename is the attribute and it has value
		//until the php dispose the object end of the script
		$session->message("The comment was deleted."); 
		// Here even database entry gone but we get the photograph_id from the instance
		// it's exist yet instead of deleting the comment from the database
		redirect_to("comments.php?id={$comment->photograph_id}");
	} else {
		$session->message("The comment could not be deleted.");
		redirect_to('list_comments.php');
	}
?>
<!-- Close is done automatically but it's good practice to close the connection -->
<?php if(isset($database)) { $database->close_connection(); } ?> 