<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>First Page</title>
</head>
<body>

	<?php $link_name = "Second Page"; ?>
	<?php $id = 2; ?>
	<?php $company = "Johnson & Johnson" ?>

	<a href="second_page.php?id=<?php echo $id;?>&company=<?php echo rawurlencode($company);?>">
	<?php echo $link_name; ?>
	</a>

</body>
</html>