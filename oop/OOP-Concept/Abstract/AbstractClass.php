<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Abstract class</title>
</head>
<body>
	<?php 
		abstract class AbstractClass
		{
			//Force Extending class to define this method
			abstract protected function getValue();
			abstract protected function prefixValue($prefix);

			//Common method
			public function printOut(){
				print $this->getValue(). "\n";
			}
		}

		class ConcreateClass1 extends AbstractClass
		{
			protected function getValue(){
				return "ConcreateClass1";
			}

			public function prefixValue($prefix){
				return "{$prefix}ConcreateClass1";
			}
		}

		class ConcreteClass2 extends AbstractClass
		{
			
		}
	 ?>
</body>
</html>