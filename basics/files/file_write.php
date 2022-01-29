<?php 

$file = 'filetest.txt';
if($handle = fopen($file,'w')) { // overwrite if anything in file
	
	fwrite($handle, 'abc'); // returns number of bytes written or false
	$content = "123\n456";	// double quotes matter (with \n)
	fwrite($handle, $content);

	fclose($handle);
	//chmod($handle,0777); chmod never work with handle because handle only work the somethig start with like fopen, fclose, fwrite etc.
	// handle is not work universally
	// chmod first parameter should be file
	// chmod($file,0777);
} else {
	echo "Could not open file for writing.";
}


// file_put_contents: shortcut for fopen/fwrite/fclose
// overwrites existing file by default (so be CAREFUl)
// If file_put_contents() is successful it returns the number of bytes written to the file, 
// otherwise it will return false
// file_put_contents — Write a string to a file
$file = 'filetest.txt';
$content = "111\n222\n333";
if($size = file_put_contents($file, $content)) {
	echo "A file of {$size} bytes was created.";
}
?>