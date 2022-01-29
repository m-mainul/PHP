<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>This Versus Self</title>
</head>
<body>
	<?php 
		class Animal {

		     public function whichClass() {
		        echo "I am an Animal!";
		    }

		   /*  Note that this method uses the $this keyword  so
		       the calling object's class type (Tiger) will be 
		       recognized and the Tiger class version of the
		       whichClass method will be called.
		   */

		    public function sayClassName() {
		       $this->whichClass();
		    }
		}

		class Tiger extends Animal {

		    public function whichClass() {
		        echo "I am a Tiger!";
		    }

		}

		$tigerObj = new Tiger();
		$tigerObj->sayClassName(); //Here whichClass() is called from the Tiger class because
		//this calling the current object and here tigerObj is the object of the Tiger class.
	 ?>
</body>
</html>