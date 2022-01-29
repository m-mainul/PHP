<?php 
// fopen(filename, mode) - open a file if it exists or create new one.
// File line endings 
// Windows \r\n
// Mac,Linux,Unix \n
$file = 'filetest.txt';
// $handle is the reference it's useful for closing the file
// if-else block is usefule if file is exists then open the file or create new one
// else execute if permission is denied
if($handle = fopen($file,'w+')) {
	fclose($handle);
} else {
	echo "Could not open file for writing.";
}

// PHP automatically close the file after ending the executeion
// Instead it's good practice to close the file after open and work on the file 
// Close the file because if we acciendtly write in the file again
// If it's need to write the file again then reopen the file and close it again
?>