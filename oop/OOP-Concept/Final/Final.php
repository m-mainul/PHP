<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Final keyword</title>
</head>
<body>
	<?php 
		class BaseClass{
			public function test(){
				echo "BaseClass::test() called\n";
			}

			final public function moreTesting(){
				echo "BaseClass::moreTesting() called\n"."<br/>";
			}
		}

		$myBaseClass = new BaseClass();
		$myBaseClass->moreTesting();

		BaseClass::moreTesting(); //non-static method can't call be statically

		// class ChildClass extends BaseClass{
		// 	public function moreTesting(){
		// 		echo "ChildClass::moreTesting() called\n";
		// 	}
		// }
	 ?>
</body>
</html>