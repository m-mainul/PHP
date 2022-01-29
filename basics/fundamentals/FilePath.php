<?php 
	$file_path = "C:\xampp\htdocs\PhPCodeStorage\PHP-Rookie\FilePath.php";
	$new_file_path = str_replace("\'", "/", $file_path);
	echo str_replace("C:\xampp\htdocs", "localhost", $new_file_path);
 ?>