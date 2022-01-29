<?php 
	class Example {
		public $ = 1;
		protected $b = 2;
		private $c = 3;

		//public by default
		function show_abc(){
			echo $this->a;
			echo $this->b;
			echo $this->c;
		}
	}

	$example = new Example();
	echo "public a: {$example->a}<br />";
	// echo "protected b: {$example->b}<br />";
	// echo "private c: {$example->c}<br />";
	$example->show_abc();
 ?>