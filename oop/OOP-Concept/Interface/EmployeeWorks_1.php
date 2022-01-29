<?php 

	class Person
	{
		private $firstname;
		private $lastname;

		public function getFullName()
		{
			return $fullname = $this->firstname." ".$this->lastname;
		}

		public function setFullName($aFirstname, $aLastname)
		{
			$this->firstname = $aFirstname;
			$this->lastname = $aLastname;
		}

	}

	interface JobCodes
	{
		const PAYROLL = "01";
		const MANAGER = "02";
		const RETAIL =  "03";
	}

	interface StandardFunctions
	{
		public function getJobTitle($aJobCode);
		public function showFullName();
	}

	class Employee extends Person //one of the limitation of php is its extend only one class at a time not more than one
	//class Employee extends Person,Employee,Department//It's not possible in php because php only extends one class at a time.
		implements JobCodes, StandardFunctions //interface solve the problem we can implement more than one interface at a time.
											   //implement means you should must override the method.
	{
		private $employed;
		private $jobcode;

		public function __construct($aFirstname, $aLastname, $aEmpId, $aJobCode)
		{
			$this->setFullName($aFirstname,$aLastname);
			$this->employedId = $aEmpId;
			$this->jobcode = $aJobCode;			
		}

		//The following function should be override in the class because we implement the interface 
		//Even if we don't definition body but we should be declare interface function in this class
		//We should at least implement empty code
		//Interface function treated as abstract method even if we didn't declare as abstract method

		function getJobTitle($aJobCode)
		{

		}

		function showFullName()
		{

		}

	}

	$myEmployee = new Employee("Steve", "Perry", "01234", "03");
	$myFullname = $myEmployee->getFullName();

	print "<p>Hi $myFullname </p>";
