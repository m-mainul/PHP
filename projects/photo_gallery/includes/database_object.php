<?php 
// If it's going to need the database, then it's
// probably smart to require it before we start.
require_once(LIB_PATH.DS."database.php");

// All of the common database methods and properties should be
// placed in the DatabaseObject class.
class DatabaseObject {
	protected static $table_name;

	// Common database methods
	public static function find_all(){
		return static::find_by_sql("SELECT * FROM ".static::$table_name);                                  
	}	

	public static function find_by_id($id=0){
		global $database;
		$result_array = static::find_by_sql("SELECT * FROM ".static::$table_name. " WHERE id={$id} LIMIT 1");
		// $result_array = $database->fetch_array($result_array);
		// echo "<pre>";
		// print_r($result_array);
		// echo "</pre>";
		// exit;
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	public static function find_by_sql($sql="") {
		global $database;
		$result_set = $database->query($sql);
		$object_array = array();
		while ($row = $database->fetch_array($result_set)){
			$object_array[] = static::instantiate($row);
		}
		return $object_array;
	}

	private static function instantiate($record){
		// Could check that $record exists and is an array
		// Simple, ling-form approach:
		// This is a tedious approach because of if we have 20 columns then write 20 different 
		// variable.
		// $object = new self;
		$class_name = get_called_class(); // This is for late static binding
		$object = new $class_name;
		// $object->id 		= $record['id'];
		// $object->username   = $record['username'];
		// $object->password   = $record['password'];
		// $object->first_name = $record['first_name'];
		// $object->last_name  = $record['last_name'];

		//More dynamic, short-form approach:
		foreach ($record as $attribute => $value) {
			if($object->has_attribute($attribute)) {
				$object->$attribute = $value;
			}
		}
		return $object;
	}

	private function has_attribute($attribute){
		// get_object_vars returns an associative array with all attributes
		// (include private ones!) as the keys and their current values as the value
		$object_vars = get_object_vars($this);
		// we don't care about the value, we just want to know if the key exists
		// will return true or false
		return array_key_exists($attribute, $object_vars);
	}

}

