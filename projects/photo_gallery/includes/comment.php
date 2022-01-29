<?php 
	// If it's going to need the database, then it's 
	// probably smart to require it before we start.
	require_once(LIB_PATH.DS.'database.php');

	class Comment extends DatabaseObject {

		protected static $table_name="comments";
		// $this->table_name="comments";
		 // $table_name="comments";
		// public $table_name="comments";
		// all of the db fields list
		protected static $db_fields = array('id', 'photograph_id', 'created' , 'author', 'body'); 
		// private $name;
		public $id;
		public $photograph_id;
		public $created;
		public $author;
		public $body;

		// "new" is a reserved word so we use "make" (or "build")
		// This function will make a comment
		// When we call make then make will return an object to us
		public static function make($photo_id, $author="Anonymous", $body=""){
			if(!empty($photo_id) && !empty($author) && !empty($body)) {
				// This is called factory
				// Factory return instances to us
				$comment = new Comment();
				$comment->photograph_id = (int)$photo_id;
				$comment->created = strftime("%Y-%m-%d %H:%M:%S", time());
				$comment->author = $author;
				$comment->body = $body;
				return $comment;
			} else {
				return false;
			}
		}

		// This method will return all of the comment that belongs to a photograph 
		public static function find_comments_on($photo_id=0){
			global $database;
			$sql  = "SELECT * FROM ".self::$table_name;
			$sql .= " WHERE photograph_id=".$database->escape_value($photo_id);
			$sql .= " ORDER BY created ASC";
			return self::find_by_sql($sql);
		}

		public static function total_comments($photo_id=0){
			global $database;
			$sql = 	"SELECT COUNT(*) AS TOTAL FROM ".self::$table_name;
			// $sql = 	"SELECT COUNT(*) FROM ".self::$table_name;
			$sql .= " WHERE photograph_id=".$database->escape_value($photo_id);
			$result = $database->query($sql);
			$count = $database->fetch_array($result);
			// var_dump($count);
			// echo $count['TOTAL'];
			// print_r($count);//exit;
			return $count['TOTAL'];
		}
		
		// Common Database Methods
		public static function find_all() {
			return self::find_by_sql("SELECT * FROM ".self::$table_name);
		}

		public static function find_by_id($id=0) {
			global $database;

			$result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id=".$database->escape_value($id)." LIMIT 1");
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
			$object = new self;
				// Simple, long-form approach:
				// $object->id 				= $record['id'];
				// $object->username 	= $record['username'];
				// $object->password 	= $record['password'];
				// $object->first_name = $record['first_name'];
				// $object->last_name 	= $record['last_name'];

				// More dynamic, short-form approach:
			foreach($record as $attribute=>$value){
				if($object->has_attribute($attribute)) {
					$object->$attribute = $value;
				}
			}
			return $object;
		}

		private function has_attribute($attribute) {
			  // get_object_vars returns an associative array with all attributes 
			  // (incl. private ones!) as the keys and their current values as the value
			  // $object_vars = get_object_vars($this);
			$object_vars = $this->attributes();
			  // We don't care about the value, we just want to know if the key exists
			  // Will return true or false
			return array_key_exists($attribute, $object_vars);
		}

		protected function attributes() {
				// return an array of attributes keys and their values
			$attributes = array();
			foreach (self::$db_fields as $field) {
				if(property_exists($this, $field)) {
					$attributes[$field] = $this->$field;
				}
			}
				// return get_object_vars($this); // get_object_vars return an associative array of all attributes of the class; all attributes may not related with the database; some are may have protected or private 
			return $attributes;
		}

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
			global $database;
				// Don't forget your SQL syntax and good habits:
				// - INSERT INTO table (key,key) VALUES ('value', 'value')
				// - single-quotes around all values
				// - escape all values to prevent SQL injection
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
			return ($database->affected_rows() == 1) ? true : false;
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
			return ($database->affected_rows() == 1) ? true : false;

					// NB: After deleting, the instance of User still
					// exists, even though the database entry does not.
					// echo $user->first_name . " was deleted";
					// but, for example, we can't call $user->update)()
					// after calling $user->delete().
		}
	}

?>