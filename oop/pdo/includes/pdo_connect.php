<?php
	$dsn = 'mysql:host=localhost;dbname=oophp'; 
	// $dsn = 'mysql:host=localhost;dbname=oophp;port=8889';
	// $dsn = 'sqlite:C:/xampp/htdocs/oophp/sqlite/oophp.db'; 
	// $dsn = 'sqlite:/Application/MAMP/htdocs/oophp/sqlite/oophp.db'; // for MAc 

	$db = new PDO($dsn, 'root','');
	
 ?>