<?php 

$file = 'filetest.txt';
if($handle = fopen($file,'r')) { // read
	// each character is 1 byte usually true for typical english
	$content = fread($handle,6); 
	fclose($handle); 
}

// Didn't break in new line print all lines in same line
echo $content;
echo "<br />";
// take new line of content and as according of content
echo nl2br($content);
echo "<hr />";

//use filesize() to read the whole file
// filesize() return the total number of bytes in file
$file = 'filetest.txt';
if($handle = fopen($file, 'r')) {
	$content = fread($handle, filesize($file));
	fclose($handle);
}

echo nl2br($content);
echo "<hr />";

// file_get_contents(): shortcut for fopen/fread/fclose/filesize()
// companion to shortcut file_put_contents()
// file_get_contents — Reads entire file into a string
$content = file_get_contents($file);
echo $content;
echo "<hr />";

// incremental reading
$file = 'filetest.txt';
$content = "";
if($handle = fopen($file, 'r')) { // read
	// loop through until end of the file 
	while(!feof($handle)) { // feof() end of file
		$content .= fgets($handle); // fgets() read one line from the file
	}
fclose($handle);
}
echo $content;
echo "<hr />";

?>