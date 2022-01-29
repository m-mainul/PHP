<?php 
// Example of anonymous function in php
// Pass Lambda to function
function shout ($message){
  echo $message();
}
 
// Call function
shout(function(){
  return "Hello world";
});

echo "<br />";

// Use create_function
$greeting = create_function('', 'echo "Hello World!";');
 
// Call function
$greeting();