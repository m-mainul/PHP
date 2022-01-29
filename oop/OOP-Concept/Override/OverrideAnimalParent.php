<?php 

	abstract class Animal
	{
		private $species;

		public function getSpecies()
		{
			return $this->species;
		}

		public function setSpecies($aSpecies)
		{
			$this->species = $aSpecies;
		}

		// public function showTitle()
		// {
		// 	print "<h1>Animal Species</h1>";
		// }

	}

	abstract class Dog extends Animal
	{
		private $breed;

		public function getBreed()
		{
			return $this->breed;
		}

		public function setBreed($aBreed)
		{
			$this->breed = $aBreed;
		}

	}

	 class MyDog extends Dog
	 {
	 	private $dogname;

	 	function __construct($aSpecies,$aBreed,$aDogname)
	 	{
	 		$this->setSpecies($aSpecies);
	 		$this->setBreed($aBreed);
	 		$this->setDogname($aDogname);
	 	}

	 	public function getDogname()
	 	{
	 		return $this->species;
	 	}

	 	public function setDogname($aDogname)
	 	{
	 		$this->dogname = $aDogname;
	 	}

	 	public function showDog()
	 	{
	 		$mySpecies = $this->getSpecies();
	 		$myBreed = $this->getBreed();

	 		print "<p> My $mySpecies is a $myBreed ";
	 		print "named $this->dogname </p>";
	 	}

	 	// public function showTitle()
	 	// {
	 	// 	print "<h1>Animal Species of the world</h1>";
	 	// }

	 	public function getSpecies()
	 	{
	 		$mySpecies = parent::getSpecies();
	 		return "$mySpecies Species";
	 	}
	 }

	 $myDog = new MyDog("Dog", "Spaniel", "Wuf Wuf");

	 //$myDog->showTitle();
	 $myDog->showDog();