<?php require_once("../includes/initialize.php"); ?>
<?php 
	if(empty($_GET['id'])){
		$session->message("No phootgraph ID was provided.");
		redirect_to('index.php');
	}

	$photo = Photograph::find_by_id($_GET['id']);
	// print_r($photo);
	if(!$photo) {
		$session->message("The photo could not be located.");
		redirect_to('index.php');
	}

	// after checking make sure we get an id
	// after make sure we find the photograph
	// Then we ready to do form processing

	// We do this following in this section 
	// but it little slow down the processing 
	// because it goes into the database and run a query that makes the site slow down

	// $comments = Comment::find_comments_on($photo->id);
	
	if(isset($_POST['submit'])){
		// If form submission fail anyway
		// then we prepopulate the form with this value
		$author = trim($_POST['author']);
		$body = trim($_POST['body']);
		// We have an id,author and body
		// So we can construct the comment
		// We can do all of the steps does required to make the comment
		// in this page like create a new instance $new_comment=new Comment
		// Then $new_comment->body = $body as like
		// but its more nice and convenient to push all of the complexity to the model or class
		$new_comment = Comment::make($photo->id,$author,$body);
		// print_r($new_comment);
		// var_dump($new_comment);exit;
		if($new_comment && $new_comment->save()){
			// comment saved
			// No message needed; seeing the comment is proof enough.
			// Important! we could just let the page render from here.
			// But then if the page is reloaded, the form will try
			// to resubmit the comment. So redirect istead:
			redirect_to("photo.php?id={$photo->id}");
		} else {
			// Failed
			$message = "There was an error that prevented the comment from being saved.";
		}
	} else {
		// If form is not submitted
		// Then we also need the value 
		// to avoid the error
		$author="";
		$body="";
	}
	// <!-- Displaying the comments need two steps processing
	// First we need to get all the comments
	// Put them in a array and assign to them in a variable 
	// Then display the array by looping through the array
	// -->
	// $comments = Comment::find_comments_on($photo->id);
	$comments = $photo->comments();
 ?>
<?php include_layout_template('header.php'); ?>

<a href="index.php">&laquo;Back</a><br><br>
<div style="margin-left: 20px;">
	<img src="<?php echo $photo->image_path();?>"/>
	<p><?php echo $photo->caption; ?></p>
</div>
<div id="comments">
	<?php foreach ($comments as $comment): ?>
		<div class="comment" style="margin-bottom: 2em;">
			<div class="author">
				<?php echo htmlentities($comment->author); ?> wrote:
			</div>
			<div class="body">
				<?php echo strip_tags($comment->body,'<strong><em><p>'); ?>
			</div>
			<div class="meta-info" style="font-size: 0.8em;">
				<?php //echo datetime_to_text($comment->created); ?>
	      		<?php echo datetime_to_text($comment->created); ?>
				<?php //echo $comment->created; ?>
			</div>
		</div>
	<?php endforeach; ?>
	<?php if(empty($comments)){ echo "No comments."; } ?>
</div>
<!-- after show the photo list all of the comments that belongs to the photo -->
<!-- list comments -->
<div id="comment-form">
	<h3>New Comment</h3>
	<?php echo output_message($message); ?>
	<form action="photo.php?id=<?php echo $photo->id; ?>" method="post">
		<table>
			<tr>
				<td>Your name:</td>
				<td><input type="text" name="author" value="<?php echo $author; ?>"></td>
			</tr>
			<tr>
				<td>Your comment:</td>
				<td><textarea name="body" cols="40" rows="8"><?php echo $body; ?></textarea></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit Comment"></td>
			</tr>
		</table>
	</form>
</div>
<?php include_layout_template('footer.php'); ?>