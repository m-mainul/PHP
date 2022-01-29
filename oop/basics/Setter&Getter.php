<?php 

class Equation
{
	private $a;
	private $b;

	public function setA($a)
	{
		$this->a = $a;
	}

	public function setB($b)
	{
		$this->b = $b;
	}

	public function equationResult()
	{
		return ($this->a*$this->a + 2*$this->a*$this->b + $this->b*$this->b);
	}
}

$equationObj = new Equation();

$equationObj->setA(1);
$equationObj->setB(1);

echo 'The result of the equation is : ' . $equationObj->equationResult();

 ?>