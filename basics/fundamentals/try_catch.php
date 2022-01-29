<?php 
	$age = '16';

	try {

		if($age>18){
			echo 'Matured';
		} else{
			throw new Exception ('Immatured');
		}

	} catch (Exception $e) {
		echo "Error:".$e->getMessage();
	}

	// try block will try to execute our code first
	// If any error occured which will send by throw new exception block
	// catch will caught the error and give the message of the throw block to the user
 ?>