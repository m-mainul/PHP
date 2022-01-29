<?php 

	class Info
	{
		//var $name = "Mainul Hasan"; //var means public
		//public $name = "Mainul Hasan";//var and public working in the same fashion.
		//setter is used for set the value of the instance variable and getter is used for return the value of the instance variable.

		private $name;

		public function setName($newName)
		{
			$this->name = $newName;
		}

		public function getName()
		{
			return $this->name;
		}

		function __construct($newName)
		{
			$this->name = $newName;
			echo $this->name;
		}

		function __destruct()
		{
			echo "<br />Destructor Called.";
		}


	}

	new Info('Mainul Hasan');

	//$myName = new Info('Mainul Hasan');

	//$myName->setName('Mainul Hasan');

	//echo $myName->getName();

 ?>