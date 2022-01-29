<?php 
	/*class table {
		function Table{
			// a PHP4 constructor
		}
	}*/
	
	/*class table{
		function __construct{
			// a PHP5 constructor
		}
	}*/

	// class Table extends Furniture{
	class Table {
		public $legs;
		static public $total_tables=0;

		function __construct($leg_count=4){//it's an better idea to give an default value to the arguments
			$this->legs = 4;			   //or parameter otherwise every time we give the argument value when
			Table::$total_tables++;		   //create an object it's also true in the case of function.
			// parent::__construct();
		}
	}
	$table = new Table();
	echo $table->legs ."<br />";

	echo Table::$total_tables."<br />";
	$t1 = new Table();
	echo Table::$total_tables."<br />";
	$t2 = new Table();
	echo Table::$total_tables."<br />";

?>