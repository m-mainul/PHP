<?php 
/**
 * Custom Exception handler.
 * Here, Exception is the php exception class
 */
class ExceptionAddress extends Exception {
	/**
	 * Magic __toString().
	 * @return string 
	 */
	public function __toString() {
		return __CLASS__.": [{$this->code}]:{$this->message}\n";
	}
}