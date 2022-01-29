<?php 

$file = 'filetest.txt';
if($handle = fopen($file, 'w+')) { // overwrite
	fwrite($handle, "123\n456\n789");

	//ftell returns the current position of cursor or pointer in the file after typing 789 in the file.
	$pos = ftell($handle); 

	// fseek seeks the new location for us. 
	// take the current position and move back 6 characters.
	fseek($handle, $pos-6); 
	fwrite($handle,"abcdef");

	// cursor back to the beginning of the file.
	rewind($handle); 
	fwrite($handle, "xyz");

	fclose($handle);
}

// Beaware, it will OVERTYPE!!!
// NOTE: a and a+ modes will not let you move the pointer

?>