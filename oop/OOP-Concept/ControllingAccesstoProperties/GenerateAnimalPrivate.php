<?php 
	Class Animal
	{
		private $species; //private variable is only accessible in parent class not in outside of the class even in the child or sub class.

		public function getSpecies()
		{
			return $this->species;
		}

		public function setSpecies($aSpecies)
		{
			$this->species = $aSpecies;
		}
	}

	class Dog extends Animal
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
			$this->dogname = $aDogname;
		}

		public function showDog()
		{
			$mySpecies = $this->getSpecies();
			$myBreed = $this->getBreed();

			print "<p>My $mySpecies is a $myBreed ";
			print "named $this->dogname </p>";
		}
	}

	$myDog = new MyDog("Dog", "Spaniel", "Wuf Wuf");

	$myDog->showDog();

	$myDog->setBreed("Shepard");

	$myDog->showDog();