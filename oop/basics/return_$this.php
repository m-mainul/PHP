<?php 

/**
* Try to understannd what actually $this return 
*/
class Person
{
	private $name;
	private $age;
	private $occupation;
	private $person;
	
	function __construct($name, $age, $occupation)
	{
		$this->name 		= $name;
		$this->age  		= $age;
		$this->occupation 	= $occupation;
	}

	/**
	 * @return string
	 */
	 public function __toString()
	 {
	     return $this->person;
	 }

	public function a_person(){
		$this->person = "The name of the person is : ".$this->name." and his age is : ".$this->age." and his occupation is : ".$this->occupation;

		return $this;
	}

}

$a_person = new Person('Mainul Hasan', '27', 'Software Engineer');
var_dump($a_person->a_person());

echo "{$a_person->a_person()}";