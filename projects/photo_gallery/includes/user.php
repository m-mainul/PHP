<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

// Model or Class handle all types of complexity related to model
class User extends DatabaseObject {
	
	protected static $table_name="users";
	// This array is useful to work with only db fields
	// because if we use get_object_vars which will return
	// all of the class attributes including private and protected
	// some of the public or private or protected attribute may not corresponding
	// field in the database.
	// The drawbacks of this process is 
	// if the model or class is so big and db_fields is so many then 
	// it may cucumbersome to list all of the db_fields listed manually
	// in this case we make an array dynamically by using query show fileds 
	// from users or realted database table.
	// but in our case table is so simple so we listed the database field manually
	protected static $db_fields = array('id', 'username', 'password' , 'first_name', 'last_name'); // all of the db fields list
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	
  public function full_name() {
    if(isset($this->first_name) && isset($this->last_name)) {
      return $this->first_name . " " . $this->last_name;
    } else {
      return "";
    }
  }

	public static function authenticate($username="", $password="") {
    global $database;
    $username = $database->escape_value($username);
    $password = $database->escape_value($password);

    $sql  = "SELECT * FROM users ";
    $sql .= "WHERE username = '{$username}' ";
    $sql .= "AND password = '{$password}' ";
    $sql .= "LIMIT 1";
    $result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	// Everything before those common method is unique but below is not
	// Common Database Methods
	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name);
  }
  
  public static function find_by_id($id=0) {
    $result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id={$id} LIMIT 1");
	return !empty($result_array) ? array_shift($result_array) : false;
  }
  
  public static function find_by_sql($sql="") {
    global $database;
    $result_set = $database->query($sql);
    $object_array = array();
    while ($row = $database->fetch_array($result_set)) {
      $object_array[] = self::instantiate($row);
    }
    return $object_array;
  }

  public static function count_all() {
  	global $database;
  	$sql = "SELECT COUNT(*) FROM ".self::$table_name;
  	$result_set = $database->query($sql);
  	$row = $database->fetch_array($result_set);
  	// Here the returned array looks like
  	/*Array
  	(
  	    [0] => 1
  	    [COUNT(*)] => 1
  	)*/
  	// The array_shift() function removes the first element from an array, and returns the value of the removed element.
  	return array_shift($row);
  }

	private static function instantiate($record) {
		// Could check that $record exists and is an array
    // $object = new User();
    // Create a new version of yourself
	// And Instantiate yourself
    $object = new self;
		// Simple, long-form approach:
    	// which will tedious if we have 50 or 100 attributes 
		// $object->id 				= $record['id'];
		// $object->username 	= $record['username'];
		// $object->password 	= $record['password'];
		// $object->first_name = $record['first_name'];
		// $object->last_name 	= $record['last_name'];
		
		// More dynamic, short-form approach:
		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		   // feeding the object attribute
		    $object->$attribute = $value;
		  }
		}
		// print_r($object);
		// exit;
		return $object;
	}
	
	private function has_attribute($attribute) {
	  // get_object_vars returns an associative array with all attributes 
	  // (include private ones!) as the keys and their current values as the value
	  // here $this looks at current instance with which we work on it.
	  // $object_vars = get_object_vars($this);
	  $object_vars = $this->attributes();
	  // We don't care about the value, we just want to know if the key exists
	  // Will return true or false
	  // check key $attribute exists in $object_vars
	  return array_key_exists($attribute, $object_vars);
	}

	// We can use raw attributes() or either sainitzed_attributes()
	// for getting the keys/attributes name/db_fields and values
	// for escaping attributes values for submitting in the database 
	protected function attributes() {
		// return an array of attributes names/keys and their values
		$attributes = array();
		foreach (self::$db_fields as $field) {
			if(property_exists($this, $field)) {
				$attributes[$field] = $this->$field;
			}
		}
		// get_object_vars return an associative array of all attributes of the class; 
		// all attributes may not related with the database; 
		// some are may have protected or private 
		// return get_object_vars($this); 
		return $attributes;
	}

	// filtering the attributes value for submitting in the database
	protected function sanitized_attributes() {
		global $database;
		$clean_attributes = array();
		// sanitize the values before submitting 
	   // Note: does not alter the actual value of each attribute
		foreach($this->attributes() as $key => $value) {
			$clean_attributes[$key] = $database->escape_value($value);
		}
		return $clean_attributes;
	}

	public function save() {
		// A new record won't have an id yet.
		return isset($this->id) ? $this->update() : $this->create();
	}

	public function create() {
		// bring the database in this object
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key,key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		// $attributes = $this->attributes();
		// self::$table_name that means abstract table name
		// We can use raw attributes() or either sainitzed_attributes()
		// for getting the keys/attributes name/db_fields and values
		// for escaping attributes values for submitting in the database 
		// $attributes = $this->attributes();
		$attributes = $this->sanitized_attributes();
		$sql  = "INSERT INTO ".self::$table_name." (";
		// $sql .= "username, password, first_name, last_name";
		$sql .= join(", ",array_keys($attributes));
		$sql .= ") VALUES ('";
		// $sql .= $database->escape_value($this->username) ."', '";
		// $sql .= $database->escape_value($this->password) ."', '";
		// $sql .= $database->escape_value($this->first_name) ."', '";
		// $sql .= $database->escape_value($this->last_name) ."')";
		$sql .= join("', '",array_values($attributes));
		$sql .= "')";
		if($database->query($sql)) {
			// to update the id with recent id
			// because our username, first_name, last_name, password already populated
			// but id is not populated
			$this->id = $database->insert_id();
			return true;
		} else {
			return false;
		}
	}

	public function update() {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - UPDATE table SET key='value', key='value' WHERE condition
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		// $attributes = $this->attributes();
		$attributes = $this->sanitized_attributes();
		$attributes_pairs = array();
		foreach($attributes as $key => $value) {
			$attributes_pairs[] = "{$key}='{$value}'";
		}
		$sql  = "UPDATE ".self::$table_name." SET ";
		$sql .= join(", ", $attributes_pairs);
		// $sql .= "username='".$database->escape_value($this->username) ."', ";
		// $sql .= "password='".$database->escape_value($this->password) ."', ";
		// $sql .= "first_name='".$database->escape_value($this->first_name) ."', ";
		// $sql .= "last_name='".$database->escape_value($this->last_name) ."'";
		$sql .= " WHERE id=". $database->escape_value($this->id);
		$database->query($sql);
		return ($database->affeected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - DELETE FROM table WHERE condition LIMIT 1
		// - escape all values to prevent SQL injection
		// - use LIMIT 1
		$sql  = "DELETE FROM ".self::$table_name;
		$sql .= " WHERE id=".$database->escape_value($this->id);
		$sql .= " LIMIT 1";
		$database->query($sql);
		return ($database->affeected_rows() == 1) ? true : false;

		// NB: After deleting, the instance of User still
		// exists, even though the database entry does not.
		// echo $user->first_name . " was deleted";
		// but, for example, we can't call $user->update)()
		// after calling $user->delete().
	}

}

?>