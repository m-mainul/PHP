<?php 
	
	// Tell us owner of the file
	echo fileowner('file_permissions.php');
	// echo fileowner('../file_permissions.php'); // go back for one forwarding directory
	// echo fileowner(__FILE__+'file_permissions.php'); // use absolute path for getting the file
 	echo "<br />";

 	//if we have Posix installed
 	$owner_id = fileowner('file_permissions.php');
 	// $owner_array = posix_getpwuid($owner_id);
 	// echo $owner_array['name'];

 	echo "<br />";

 	chown('file_permissions.php','hasan');
	// chown only works if PHP is superuser
	// making webserver/PHP a superuser is a big security issue
	// unlike chown we can use chmod for giving the permission to the right user

	//if we have Posix installed
	// $owner_id = fileowner('file_permissions.php');
	// $owner_array = posix_getpwuid($owner_id);
	// echo $owner_array['name']; 

 	echo "<br />";

 	// file permissions in php always have the leading 0 like 0444
 	echo substr(decoct(fileperms('file_permissions.php')),2); //decoct() decimel to octal conversion
 	chmod('file_permissions.php',0444);
 	echo substr(decoct(fileperms('file_permissions.php')),2); //decoct() decimel to octal conversion

 	echo "<br />";	
 	echo is_readable('file_permissions.php') ? 'yes' : 'no';
 	echo "<br />";	
 	echo is_writable('file_permissions.php') ? 'yes' : 'no';
 ?>