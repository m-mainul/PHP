<?php 

// we already used:
// dirname()
// is_dir()

// getcwd(): Current Working Directory
echo getcwd() . "<br />";

// mkdir() -- make directory
mkdir('new', 0777); // 0777 is the PHP default

// we can use umask() to change default permission settings
// default may be 0022

// recursive dir creation
// true is for recursive or not. 
// create test inside new and also test2 inside test.
mkdir('new/test/test2',0777,true); 
// if pass more than one parameter we must include true 
// new/test/test2 we must include true otherwise dir will not create
// mkdir('old/test/test2',0777,false);
// mkdir('new_one/test/test2',0777);// will not work.

// changing directory
chdir('new');
echo getcwd() . "<br />";

// removing a directory
rmdir('test/test2');

// must be closed and EMPTY before removal (and be CAREFUL)
// scripts to help you wipe out directories with files:
// http://www.php.net/manual/en/function.rmdir.php
?>