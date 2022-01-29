<?php 
	Class Animal
	{
		public $species;

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
		public $breed;

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
		public $dogname;

		function __construct($aSpecies,$aBreed,$aDogname)
		{
			$this->species = $aSpecies;
			$this->breed = $aBreed;
			$this->dogname = $aDogname;
		}

		public function showDog()
		{
			print "<p>My $this->species is a $this->breed ";
			print "named $this->dogname </p>";
		}
	}

	$myDog = new MyDog("Dog", "Spaniel", "Wuf Wuf");

	$myDog->showDog();

	$myDog->setBreed("Collie");

	$myDog->showDog();