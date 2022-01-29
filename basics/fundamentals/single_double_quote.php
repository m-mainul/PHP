<?php 
	
	$city_code = 33; 

	$query = 'SELECT name ';
	$query .= 'FROM students ';
	$query .= 'WHERE city_code = "'.$city_code.'"';

	$query = "SELECT name ";
	$query .= "FROM students ";
	$query .= "WHERE city_code = '".$city_code."'";

	echo $query;
 
 ?>