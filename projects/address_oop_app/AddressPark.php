<?php 
// Address Park
class AddressPark extends Address {
	// public $country_name = 'Australia';

	// Initialization
	protected function _init() {
		$this->_setAddressTypeId(Address::ADDRESS_TYPE_PARK);
	}
	/**
	 * Override the display() method
	 */
	public function display() {
		$output = '<div style="background-color:PaleGreen;">';
		$output.= parent::display();
		$output.= '</div>';
		return $output;
	}
}