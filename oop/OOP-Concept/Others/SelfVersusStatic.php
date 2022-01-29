<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Self Versus Static</title>
</head>
<body>
	<?php 
		class Car
		{
		    public static function model()
		    {
		         self::getModel(); //Self references the current class
		    }
			// public static function model()
			// {
			// 	  static::getModel(); 
			// 	  //static allows the function to bind to the calling class at runtime
			// 	  //static will get function from the calling class if the method is exist in 
			// 	  //calling class or child class otherwise it will get method from the base class
			// }

		    protected static function getModel()
		    {
		        echo "I am a Car!";
		        echo "<br/>";
		    }

		}

		class Mercedes extends Car
		{

		    protected static function getModel()
		    {
		        echo "I am a Mercedes!";
		    }
		}

		Car::model();
		Mercedes::model();
	 ?>
</body>
</html>