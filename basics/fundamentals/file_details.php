<?php  

$filename = 'filetest.txt';

echo filesize($filename) . "<br />"; // in bytes

// filemtime: last modified (changed content)
// filectime: last changed (changed content or metadata)
// fileatime: last accessed (any read/change)

echo strftime('%m/%d/%Y %H:%M', filemtime($filename)) . "<br />";
echo strftime('%m/%d/%Y %H:%M', filectime($filename)) . "<br />";
echo strftime('%m/%d/%Y %H:%M', fileatime($filename)) . "<br />";

// touch($filename); // touch — Sets access and modification time of file
// first time output will same as before 
// because it's come from browser cache 
// touch will not flash the cache first time
// second time cache will refresh with new value because page is reloading

echo strftime('%m/%d/%Y %H:%M', filemtime($filename)) . "<br />";
echo strftime('%m/%d/%Y %H:%M', filectime($filename)) . "<br />";
echo strftime('%m/%d/%Y %H:%M', fileatime($filename)) . "<br />";

// The pathinfo() function returns an array that contains information about a path.
// The following array elements are returned:
// [dirname]
// [basename]
// [extension]

$path_parts = pathinfo(__FILE__);
print_r($path_parts);
echo $path_parts['dirname'] . "<br />";  // " D:\xampp\htdocs\PhPCodeStorage\Advance_PHP"
echo $path_parts['basename'] . "<br />"; // "file_details.php"
echo $path_parts['filename'] . "<br />"; // "file_details"
echo $path_parts['extension'] . "<br />";// "php"

?>