<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HTML encoding</title>
</head>
<body>
	
<p>&lt;</p>
<p>&gt;</p>
<p>&amp;</p>
<p>&quot;</p>

<?php 
	$linktext = "<click> & learn more";
	$linktext1 = "€¢£¥₩₪฿S$<>&?&lt";
 ?>
<?php echo $linktext1; ?> <br>
<?php echo htmlentities($linktext1); ?> <br>

<a href="">	
	<?php echo htmlspecialchars($linktext); ?> <br>
	<?php echo htmlentities($linktext); ?>
</a>
<?php 
	//The htmlspecialchars() function converts special characters to HTML entities.
	//This means that it will replace HTML characters like < and > with &lt; and &gt;.
 ?>
<?php //what to use when
	
	$url_page = "php/created/page/url.php";
	$param1 = "This is a string with < >";
	$param2 = "&#?*$[]+ are bad characters";
	$linktext = "<click> & learn more";

	$url = "http://localhsot/";
	$url .= rawurlencode($url_page);
	$url .="?" . "param1" . urlencode($param1); 
	$url .="?" . "param2" . urlencode($param2);
 ?>

 <a href="<?php echo htmlspecialchars($url); ?>">
	<?php echo htmlspecialchars($linktext); ?>
 </a>
</body>
</html>