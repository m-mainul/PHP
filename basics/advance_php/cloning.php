<?php 
	//Cloning means copy object.
	//References pointing the same object.

	class Beverage{
		public $name;

		function __construct(){
			echo "New beverage was created.<br>";
		}

		function __clone(){
			echo "Existing beverage was cloned.<br />";
		}
	}

	$a = new Beverage();
	$a->name = "coffee";
	$b = $a; //always a reference with objects
	$b->name = "tea";
	echo $a->name;
	echo "<br />";

	$c = clone $a;
	$c->name = "orange juice"; //changing of c does not effect on a because c is copy of a 
	echo $a->name;			   //whereas b is the reference of a that's why changing b is directly
	echo "<br />";			  //impact on a.
	echo $c->name; 
?>