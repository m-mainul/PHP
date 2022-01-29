<?php 

// Like fopen/fread/fclose:
// opendir()
// readdir()
// closedir()

// current working directory
// . signigificance current directory
$dir = "."; 
if(is_dir($dir)) {
	if($dir_handle = opendir($dir)) {
		// readdir read each items from directory one by one 
		while($filename = readdir($dir_handle)) {
			// $filename is successful
			// then we can work with file as our expected
			// open,read,edit,changes_permission as so on.
			// Here we just echo the file name
			// stripos return the position
			// here if position is greater than 0 then echo the file name
			if (stripos($filename, '.') > 0) {
				echo "filename: {$filename}<br />";
			}
			
		}
		// use rewinddir($dir_handle) to start over 
		// List once again files in images directory
		// after loop we should ensure that close directory for safety
		closedir($dir_handle);
	}
}

echo "<hr />";

//scandir(): reads all filenames into an array
if(is_dir($dir)) {
	$dir_array = scandir($dir);
	foreach ($dir_array as $file) {
		// stripos - Find the position of the first occurrence of "." inside the string
		if(stripos($file, '.') > 0) { 
			echo "filename: {$file}<br />";
		}
	}
}
// not much shorter, but maybe less complicated
// makes things like reverse order much easier
?>