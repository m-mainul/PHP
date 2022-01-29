<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Loops: foreach</title>
</head>
<body>
	<?php //include("abcd.php"); ?>
	<?php require("abcd.php"); ?>
	<?php 
		$ages = array(4,8,15,16,23,42);

		foreach ($ages as $age) {
			echo "Age: {$age} <br/>";
		}
		echo "<br/>";
		print_r($ages);
	 ?>
	 <pre>
	 	<?php 
	 		print_r($ages);
	 	 ?>
	 </pre>
	<br>
	 <?php //foreach using assoc. array

	 	$person = array(
	 					"first_name" =>"kelvin",
	 					"last_name"  => "James",
	 					"address"    =>"123 Main Street",
	 					"city"		 =>"Dhaka",
	 					"state"		 =>"CA",
	 					"zip_code"	 => "9201"
	 					);
	 	foreach ($person as $attribute => $data) {
	 		$attr_nice = ucwords(str_replace("_", " ", $attribute));//This code is mainly useful showing the code to the user in nice fromat
	 		//for example database returns the zip_code but we can return the string in much better format like Zip Code.
	 		echo "{$attr_nice} : {$data}<br/>";
	 	}
	  ?>
	  <br>
	  <?php 
	  	$prices = array("Bran New Computer" => 2000,
	  					"1 month of Lynda.com"=>25,
	  					"Learning PHP"=>null);

	  	foreach ($prices as $item => $price) {
	  		echo "{$item}: ";
	  		if (is_int($price)) {
	  			echo "$" . $price;
	  		}else{
	  			echo "priceless";
	  		}
	  		echo "<br/>"; 
	  	}
	   ?>

</body>
</html>