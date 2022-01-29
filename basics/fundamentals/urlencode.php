<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>First Page</title>
</head>
<body>
	<?php 
		$page = "William   Shakespeare";
		$quote = "To be or not to be";
		
		$link1 = "/bio/" . rawurldecode($page) . "?quote=" . urlencode($quote);
		echo $link1 . "<br />";

		$link2 = "/bio/" . urldecode($page) . "?quote=" . rawurlencode($quote);
		echo $link2 . "<br />";


	 ?>
</body>
</html>