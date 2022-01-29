<?php 
	
	abstract class Animal
	{
		private $species;//make a variable private in abstract because we don't need in inheritence class
						 //Something abstract i.e we don't need directly instantiated

		public function getSpecies()
		{
			return $this->species;
		}

		public function setSpecies($aSpecies)
		{
			$this->species = $aSpecies;
		}
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

		function __construct($aSpecies, $aBreed, $aDogname)
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

			print "<p>My $mySpecies is a $myBreed ";
			print "named $this->dogname </p>";
		}

	}

	$myDog = new MyDog("Dog", "Spaniel", "Wuf Wuf");

	$myDog->showDog();
	