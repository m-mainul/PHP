<?php 

 	class Animal
 	{
 		//Protected variable is part of the extention chain but we cann't access the protected variable directly by extended class.
 		//If call a variable protected in base class it will be directly useable in child class but we can't directly call the variable 
 		//by using object of the child class.
 		protected $species; 

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
 		protected $breed;

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

 		function __construct($aSpecies, $aBreed, $dogname)
 		{
 			$this->setSpecies($aSpecies);
 			$this->setBreed($aBreed);
 			$this->setDogname($dogname);
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
 			print "<p>My $this->species is a $this->breed ";
 			print "named $this->dogname </p>";
 		}
 	}

 	$myDog = new MyDog("Dog", "Spaniel", "Wuf Wuf");

 	$myDog->showDog();

 	$myDog->setBreed("shepard");

 	$myDog->showDog();

 	//print "<p>Fatal Error if I access a protected variable directly: ".$myDog->breed."</p>";