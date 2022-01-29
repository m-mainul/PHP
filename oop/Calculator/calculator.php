<?php 
class Calculator{
	private $first_no;
	private $second_no;

	function __construct($first_no,$second_no)
	{
		$this->first_no = $first_no;
		$this->second_no = $second_no;
	}

	public function get_first_no()
	{
		return $this->first_no;
	}

	public function get_second_no()
	{
		return $this->second_no;
	}


	public function add()
	{
		return $this->first_no + $this->second_no;
	}

	public function subtract()
	{
		return $this->first_no - $this->second_no;
	}

	public function divide()
	{
		if($this->second_no == 0)
		{
			echo 'The divide is not possible because denominator is zero.';
		}
		else
		{
			return $this->first_no / $this->second_no;
		}

		
	}	
}
?>