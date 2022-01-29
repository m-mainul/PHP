<?php 
require_once(LIB_PATH.DS."config.php");

// class name MySQLDatabase because of easily swapping the database 
// or identify the database related class.
class MySQLDatabase { 

	private $connection;
	// it allows us to find what was the last query
	public $last_query;
	private $magic_quotes_active;
	private $real_escape_string_exists;

	function __construct(){
		// we call the open_connection() in construct because as soon as object is created 
		// then database connection is opened up.
		$this->open_connection(); 
		$this->magic_quotes_active = get_magic_quotes_gpc();
		$this->real_escape_string_exists = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
	}

	public function open_connection(){
		$this->connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
		if(!$this->connection){
			die("Database connection failed: ".mysql_error());
		} else {
			$db_select = mysql_select_db(DB_NAME, $this->connection);
			if(!$db_select){
				die("Database selection failed: ".mysql_error());
			}
		}
	}

	public function close_connection(){
		if(isset($this->connection)){
			mysql_close($this->connection);
			unset($this->connection);
		}
	}

	public function query($sql){
		// set the query each and every time in last query
		$this->last_query = $sql;
		$result = mysql_query($sql, $this->connection);
		$this->confirm_query($result);
		return $result;
	}

	public function escape_value( $value ) {
		if( $this->real_escape_string_exists ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $this->magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$this->magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}

	//"database-neutral" methods
	public function fetch_array($result_set){
		return mysql_fetch_array($result_set);
	}

	public function num_rows($result_set){
		return mysql_num_rows($result_set);
	}

	public function insert_id(){
		// get the last id inserted over the current db connection
		return mysql_insert_id($this->connection);
	}

	// how many rows are affected in last time
	public function affected_rows(){
		return mysql_affected_rows($this->connection);
	}

	// Here fetch_array,num_rows,insert_id,affected_rows,escape_value these functions are 
	// database neutral user defined methods

	// This method is private because it will not call from outside of the class
	// Method and attribute will be private if it only be used inside the class
	private function confirm_query($result){
		if(!$result){
			$output = "Databse query failed: ".mysql_error() . "<br /><br/>";
			// This is just for testing purpose
			// but in production mode it must be commented
			$output .= "Last SQL query: " . $this->last_query; 
			die($output);									   
		}
	}
}

$database = new MySQLDatabase();
$db =& $database;

?>