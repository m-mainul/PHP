	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Validations</title>
	</head>
	<body>
		<?php 
		/* Validation Type */

		// * presence
		$value = "";
		if (!isset($value) || empty($value)) {
			//echo "Validation failed.<br/>";
		}


		// * string length
		//minimum length
		$value ="abce";
		//var_dump($value);
		$min = 3;
		if (strlen($value) < $min) {
			echo "Validation failed.<br/>";
		}
		//maximum length
		$max = 6;
		if (strlen($value) > $max) {
			echo "Validation failed.<br/>";
		}

		// * type
		$value = "1";
		if (!is_string($value)) {
			echo "Validation failed.<br/>";
		}

		// * inclusion in a set
		$value = "5";
		$set = array("1", "2", "3", "4");
		if (!in_array($value, $set)) {
			echo "Validation failed.<br/>";
		}

		// * uniqueness
		//uses a database to check uniqueness

		// * format
		// use a regex on a string
		// preg_match($regex, $subject)
		if (preg_match("/PHP/", "PHP is fun.")) {
			echo "A match was found.";
		}else{
			echo "A match was not found.";
		}

		$value = "nobody@nowhere.com";
		//preg_match is most flexible
		if(!preg_match("/@/", $value))
		{
			echo "Validation failed.<br/>";
		}

		//strpos is faster than preg_match
		//use === to make exact match with false
		if (strpos($value, "@") === false) {
			echo "Validation failed.<br/>";
		}

		?>


	</body>
	</html>