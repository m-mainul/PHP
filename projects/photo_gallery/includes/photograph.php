<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Photograph extends DatabaseObject {

	protected static $table_name="photographs";
	protected static $db_fields = array('id', 'filename', 'type' , 'size', 'caption'); // all of the db fields list
	public $id;
	public $filename;
	public $type;
	public $size;
	public $caption;

	private $temp_path;
	protected $upload_dir = "images";
	// We use the array errors to keep track all of the errors
	public $errors = array();

	protected $upload_errors = array(
		//http://www.php.net/manual/en/features.file-upload.errors.php
		UPLOAD_ERR_OK  			=> "no errors.",
		UPLOAD_ERR_INI_SIZE 	=> "Larger than upload_max_filesize.",
		UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
		UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
		UPLOAD_ERR_NO_FILE		=> "No file.",
		UPLOAD_ERR_NO_TMP_DIR	=> "No temporary directory.",
		UPLOAD_ERR_CANT_WRITE	=> "Can't write to disk.",
		UPLOAD_ERR_EXTENSION	=> "File upload stopped by extension."
	);	

	// Pass in $_FILES(['uploaded_file']) as an argument
	public function attach_file($file) {
		// Perform error checking on the form parameters
		if(!$file || empty($file) || !is_array($file)) {
			// error:: nothing uploaded or wrong argument usage
			$this->errors[] = "No file was uploaded.";
			return false;
		} elseif($file['error'] != 0) {
			//error: report what PHP says went wrong
			$this->errors[] = $this->upload_errors[$file['error']];
			return false;
		} else {
		// Set object attributes to the form parameters.
			$this->temp_path = $file['tmp_name'];
			$this->filename  = basename($file['name']);
			$this->type      = $file['type'];
			$this->size  	 = $file['size'];
			// Don't worry about saving anything to the database yet.
			return true;
	   }
		
	}

	// For saving photograph in upload folder or in database we create
	// public function save_with_file()
	// or overridden parent method like
	// public function save(){
		// call the parent method as like
		// if we want to call the original method or parent method
		// Then call as like
		// parent::save(); 
	//}
	// both are valid approach
	// In our application we use override the save() method

	// To save a record in database we just simply do following in user class
	// public function save(){
	// 	// A new record won't have an id yet.
	// 	return isset($this->id) ? $this->update() : $this->create();
	// }

	// but in photograph class we want to give some more functionality
	// so we create a custom save method in this photograph class
	// public function save(){
	// 	// A new record won't have an id yet.
	// 	if(isset($this->id)) {
	// 		$this->update();
	// 	} else {
	// 		// Make sure there are no errors
	// 		// Attempt to move the file 
	// 		// Save a corresponding entry to the database
	// 		$this->create();
	// 	}
	// }
	
	public function save() {
		// A new record won't have an id yet.
		if(isset($this->id)) {
			// Really just to update the caption
			// not move the file again
			$this->update();
		} else {
			// Make sure there are no errors

			// Can't save if there are pre-existing errors
			if(!empty($this->errors)) { return false; }

			// Make sure the caption is not too long for the DB
			// if(strlen($this->caption) < 10) {
			if(strlen($this->caption) >= 255) {
				$this->errors[] = "The caption can only be 255 characters";
				return false; 
			}

			// Can't save without filename and temp location
			if(empty($this->filename) || empty($this->temp_path)) {
				$this->errors[] = "The file location was not available.";
				return false;
			}

			// Determine the target_path
			$target_path = SITE_ROOT.DS.'public'.DS.$this->upload_dir.DS.$this->filename;

			// Make sure a file doesn't already exist in the target location
			if(file_exists($target_path)) {
				$this->errors[] = "The file {$this->filename} already exists.";
				return false;
			}
			// Attempt to move the file
			if(move_uploaded_file($this->temp_path, $target_path)) {
				// Success
				// Save a corresponding entry to the database
				if($this->create()) {
					// we are done with temp_path, the file isn't there anymore
					unset($this->temp_path);
					return true;
				}
			} else {
				// File was not moved.
				$this->errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
				return false;
			}
		}
	}

	public function destroy() {
		// First remove the database entry
		if($this->delete()) {
		// if($photo->delete()) {
			// then remove the file from the site
			// we should remove the file otherwise it will gives error file exists in future when we upload the same file again
			// Note that even though the database entry is gone, this object
			// is still around (which lets us use $this->image_path()).
			$target_path = SITE_ROOT.DS.'public'.DS.$this->image_path();
			// The unlink() function deletes a file.
			return unlink($target_path) ? true : false; 
		} else {
			// database delete failed
			// didn't destroy the file successfully
			return false; 
		}
	}

	public function image_path() {
		return $this->upload_dir.DS.$this->filename;
	}

	// public function image_path() {
	// 	return $this->filename;
	// }

	public function size_as_text() {
		if($this->size < 1024) {
			return "{$this->size} bytes";
		} elseif ($this->size < 1048576) {
			$size_kb = round($this->size/1024);
			return "{$size_kb} KB";
		} else {
			$size_mb = round($this->size/1048576, 1);
			return "{$size_mb} MB";
		}
	}

	// Instead of use $photo->id use $this->id
	// Use this object id and gives or returns all of its comments
	public function comments() {
		return Comment::find_comments_on($this->id);
	}

	public function total_comments_on_a_photo(){
		return Comment::total_comments($this->id);
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

	// replaced with a custom save()
	// public function save() {
	// 		// A new record won't have an id yet.
	// 	return isset($this->id) ? $this->update() : $this->create();
	// }

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

