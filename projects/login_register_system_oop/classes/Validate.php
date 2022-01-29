<?php 
class Validate {
	private $_passed = false,
			$_errors =array(),
			$_db = null;

	public function __construct() {
		$this->_db = DB::getInstance();
	}

	public function check($source, $items = array()) {
		foreach ($items as $item => $rules) {
			foreach ($rules as $rule => $rule_value) {
				
				$value = $source[$item];
				$item = escape($item);
				// var_dump($value);

				if($rule === 'required' && empty($value)) {
					$this->addError("{$item} is required");
				} else if(!empty($value)) {
					switch ($rule) {
						case 'min':
							if(strlen($value) < $rule_value) {
								$this->addError("{$item} must be a minimum of {$rule_value} characters.");
							}
						break;
						case 'max':
							if(strlen($value) > $rule_value) {
								$this->addError("{$item} must be a maximum of {$rule_value} characters.");
							}
						break;
						case 'matches':
						// var_dump($value); var_dump($source[$rule_value]); 
							if($value != $source[$rule_value]) {
								$this->addError("{$rule_value} must match with {$item}");
							}
						break;
						case 'unique':
							$check = $this->_db->get($rule_value, array($item, '=', $value));
							// var_dump($check);
							if($check->count()) {
								$this->addError("{$item} already exists.");
							}
						break;
						default:
							# code...
							break;
					}
				}
			}
		}

		if(empty($this->errors())) {
			$this->_passed = true;
		}

		return $this;
	}

	private function addError($error) {
		$this->_errors[] = $error;
	}

	public function errors() {
		return $this->_errors;
	}

	public function passed() {
		return $this->_passed;
	}
}