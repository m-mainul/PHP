<?php 
require_once("config.php");
// MySQli database; only one connection is allowed.
class Database {
	private $_connection;
	// Store the single instance.
	private static $_instance;

	// Get an instance of the Database.
	// return Database
	public static function getInstance() {
		if (!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __construct() {
		// $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
		$this->_connection = mysqli_connect('localhost', 'root', '','demo');
		// Error handling.
		if(mysqli_connect_error()) {
			trigger_error('Failed to connect to MySQli: '.mysqli_connect_error(),E_USER_ERROR);
		}
	}

	// Empty clone magic method to prevent duplication
	private function __clone() {}

	// Get the mysqli connection
	public function getConnection() {
		return $this->_connection;
	}

}