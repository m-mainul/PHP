<?php 
class DB {
	private static $_instance = null;
	private $_pdo, 
			$_query, 
			$_error = false, 
			$_results, 
			$_count = 0;
	public function __construct() {
		try {
			$this->_pdo = new PDO('mysql:host=' .Config::get('mysql/host').';dbname='. Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
			// echo 'connected';
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	}

	// This will return single instance 
	// So its helpful for us to avoid connecting database again and again
	public static function getInstance() {
		if(!isset(self::$_instance)) {
			self::$_instance = new DB();
		}
		return self::$_instance;
	}

	public function query($sql, $params = array()) {
		// We can execute multiple queries one after another
		// so we should reset the error avoiding previous queries error
		$this->_error = false;
		if($this->_query = $this->_pdo->prepare($sql)) {
			// Check whether params has value or not
			// and also check its an array
			// bind value
			$x = 1;
			if(count($params)) {
				foreach ($params as $param) {
					// bind value
					// $x is position we can use key as pos
					// for simplicity here we use a variale named $x
					$this->_query->bindValue($x, $param);
					$x++;
				}
			}

			// execute the query
			if($this->_query->execute()) {
				// If execution is successful
				// Then we should store the results
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count = $this->_query->rowCount();
			} else {
				$this->_error = true;
			}
		}

		return $this;
	}

	public function action($action, $table, $where = array()) {
		// here 3 for field,operator & value
		if(count($where) === 3) {
			$operators = array('=', '<', '>', '<=', '>=');

			$field 		= $where[0];
			$operator 	= $where[1];
			$value 		= $where[2];

			// Check passed operator is in operators or not
			if(in_array($operator, $operators)) {
		 		// $sql = "SELECT * FROM users WHERE username = 'Alex'";
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

				if(!$this->query($sql, array($value))->error()) {
					// When query executed successfully then we should return current object
				   //  because we allows to result set
					return $this;	
				}
			}

		}
		return false;
	}

	public function get($table, $where) {
		return $this->action('SELECT *', $table, $where);
	}

	public function delete($table, $where) {
		return $this->action('DELETE', $table, $where);
	}

	public function insert($table, $fields = array()) {
		if(count($fields)) {
			$keys 	= array_keys($fields);
			$values = null;
			$x 		= 1;

			foreach($fields as $field) {
				$values .= '?';
				if($x < count($fields)) {
					$values .= ', ';
				}
				$x++;
			}

			// die($values);

			$sql = "INSERT INTO users (`" . implode('`, `', $keys) . "`) VALUES ({$values})";
			// echo $sql;
			if(!$this->query($sql, $fields)->error()) {
				return true;
			}
			
		}
		return false;
	}

	public function update($table, $id, $fields) {
		$set = '';
		$x 	 = 1;

		foreach($fields as $name => $value) {
			$set .= "{$name} = ?";
			if($x < count($fields)) {
				$set .= ', ';
			}
			$x++;
		}

		// die($set);

		$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

		// echo $sql;
		if(!$this->query($sql, $fields)->error()){
			return true;
		}

		return false;
	}

	// by default return false
	// return true after executing query() method if query execution is failed
	// then else block executed and return true
	public function error() {
		return $this->_error;
	}

	public function count() {
		return $this->_count;
	}

	public function results() {
		return $this->_results;
	}

	public function first() {
		// return $this->_results[0];
		// Or
		return $this->results()[0];
	}
}