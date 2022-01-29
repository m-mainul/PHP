<?php 
	
	class BaseClass {
		private $first_number;
		private $second_number;

		public function add($a,$b){
			$this->first_number = $a;
			$this->second_number = $b;

			return $this->first_number + $this->second_number; 
		}
	}

	class SubClass extends BaseClass{

	}

	$myObject = new SubClass();

	echo "The addition of First Number & Second Number is :".$myObject->add(3,4);
	
 ?>