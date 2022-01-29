<?php
	
	// Suppose you have a class named father and you have a class named child.
	// Guess father has four sons. In traditional programming if we want to need the 
	// information of father for every child then we must be rewrite the code of the 
	// father information. But in oop it is so musch easy by using inheritence because 
	// in oop we only create a base class for father and it will be extended 
	// by child class.Hence we reuse the code and avoiding duplicate code.

class Animal
{
	public $type;

	public function __construct($aType){
		$this->type = $aType; //Use new String object!
	}

	public function showType(){
		print "<p>My Animal is a $this->type </p>";
	}
}

class Dog extends Animal
{
	public $name;

	public function __construct(){
		parent::__construct("Collie"); //here Parent says call the parent constructor which i was defined in parent class. 
	}

	public function showDog($aName){
		$this->name = $aName; //supplied name
		print "<p>$this->name is a $this->type </p>";
	}
}
	  

