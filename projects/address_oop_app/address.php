<?php
// require 'database.php';
/**
 * Physical address. 
 */
abstract class Address implements Model{
  const ADDRESS_TYPE_RESIDENCE = 1;
  const ADDRESS_TYPE_BUSINESS = 2;
  const ADDRESS_TYPE_PARK     = 3;

  const ADDRESS_ERROR_NOT_FOUND = 1000;

  // Address types.
  static public $valid_address_types = array(
    // There is no functional difference between having the raw numbers there
    // in the constants, which is part of the goal. From a code maintainability perspective,
    // those constant values are now available to any other piece of code and can be referred to using semantic names 
    // as opposed to trying to remember what number is associated with which value.
    Address::ADDRESS_TYPE_RESIDENCE => 'Residence',
    Address::ADDRESS_TYPE_BUSINESS  => 'Business',
    Address::ADDRESS_TYPE_PARK      => 'Park'
  );
  // Street address.
  public $street_address_1;
  public $street_address_2;
  
  // Name of the City.
  public $city_name;
  
  // Name of the subdivison.
  public $subdivision_name;
  
  // Postal code.
  protected $_postal_code;
  
  // Name of the Country.
  public $country_name;
  
  // Primary key of an Address.
  protected $_address_id;
  
  // Address type_id.
  protected $_address_type_id;
  
  // When the record was created and last updated.
  protected $_time_created;
  protected $_time_updated;
  
  function __clone() {
    // $this->_time_created = 12345;
    $this->_time_created = time();
    // $this->_time_updated = 67890;
    $this->_time_updated = NULL;
  }

  // Constructor
  // array $data optional array of property names and values.
  function __construct($data = array()) {
    $this->_init();
    $this->_time_created = time();
    // Sanity check ensuring that the argument is really an array
    // if not trigger an error and fail.
    // Ensure that the Address can be populated.
    if (!is_array($data)) {
      trigger_error('Unable to construct address with a '.get_class($name));
    }

    // If there is data in the array, If there is at least one value,
     // populate the Address with it.
    if (count($data) > 0) {
      foreach($data as $name => $value) {
      // Special case for protected properties.
      if (in_array($name, array(
        'time_created',
        'time_updated',
        'address_id',
        'address_type_id'
        ))) {
         $name = '_'.$name;
      }
      // The existing magic set method will trigger an error if we attempt to set
      // an invalid property
      $this->$name = $value; 
     }
    }
  }

  /**
   * Magic __get.
   * @param string $name 
   * @return mixed
   */
  function __get($name) {
    // Postal code lookup if unset.
    if (!$this->_postal_code) {
      $this->_postal_code = $this->_postal_code_guess();
      // echo 'Hi';
      // echo $this->_postal_code; exit;
    }
    
    // Attempt to return a protected property by name.
    $protected_property_name = '_' . $name;
    if (property_exists($this, $protected_property_name)) {
       return $this->$protected_property_name;
    }
    
    // Unable to access property; trigger error.
    trigger_error('Undefined property via __get: ' . $name);
    return NULL;
  }
  
  /**
   * Magic __set.
   * @param string $name
   * @param mixed $value 
   */
  function __set($name, $value) {
    // Only set valid address_type_id.
    // if ('address_type_id' === $name){
    //   $this->_setAddressTypeId($value);
    //   return;
    // }
    // Allow anything to set the postal code.
    if ('postal_code' == $name) {
      $this->$name = $value;
      return;
      // return $name;
    }
    
    // Unable to access property; trigger error.
    trigger_error('Undefined or unallowed property via __set(): ' . $name);
  }
  
  // Magic __toString.
  // return string
  function __toString() {
    return $this->display();
  }

  // Force extending classes to implement init mehtod.
  abstract protected function _init();

  /**
   * Guess the postal code given the subdivision and city name.
   * @todo Replace with a database lookup.
   * @return string 
   */
  protected function _postal_code_guess() {
    // return 'LOOKUP';
    $db = Database::getInstance();
    $mysqli = $db->getConnection();

    $sql_query = 'SELECT postal_code ';
    $sql_query .= 'FROM location ';

    // $city_name = $mysqli->mysqli_real_escape_string($this->city_name);
    $city_name = mysqli_real_escape_string($mysqli,$this->city_name);
    // $sql_query .= 'WHERE city_name = "'.$this->city_name.'" ';
    $sql_query .= 'WHERE city_name = "'.$city_name.'" ';

    $subdivision_name = mysqli_real_escape_string($mysqli,$this->subdivision_name);
    $sql_query .= 'AND subdivision_name = "'.$subdivision_name.'"';

    // echo $sql_query; exit;

    $result = mysqli_query($mysqli,$sql_query);

    // var_dump($result); exit;

    if($row = mysqli_fetch_assoc($result)) {
      // echo $row['postal_code'];
      // exit;
      return $row['postal_code'];
    }
  }
  
  /**
   * Display an address in HTML.
   * @return string 
   */
  function display() {
    $output = '';
    
    // Street address.
    $output .= $this->street_address_1;
    if ($this->street_address_2) {
      $output .= '<br/>' . $this->street_address_2;
    }
    
    // City, Subdivision Postal.
    $output .= '<br/>';
    $output .= $this->city_name . ', ' . $this->subdivision_name;
    $output .= ' ' . $this->postal_code;
    
    // Country.
    $output .= '<br/>';
    $output .= $this->country_name;
    
    return $output;
  }

  static public function isValidAddressTypeId($address_type_id){
    return array_key_exists($address_type_id, self::$valid_address_types);
  }

  // If valid set the address type id
  // param int $address_type_id
  protected function _setAddressTypeId($address_type_id){
    if (self::isValidAddressTypeId($address_type_id)) {
      $this->_address_type_id = $address_type_id;
    }
  }

  /**
   * load an address
   * @param  int $address_id 
   */
  final public static function load($address_id){
    $db = Database::getInstance();
    $mysqli = $db->getConnection();

    // $sql_query  = 'SELECT address.* ';
    $sql_query  = 'SELECT * ';
    $sql_query .= 'FROM address ';
    $sql_query .= 'WHERE address_id = "'.(int) $address_id.'"';
    $result = $mysqli->query($sql_query);
    // Retrieving Objects from the database
    // if($row = $result->fetch_object()) {
    if($row = $result->fetch_assoc()) {
      // var_dump($row);
      // exit;
      return self::getInstance($row['address_type_id'],$row);
    }
    // If a row is not found, then throw an exception.
    // throw new Exception('Address not found.');
    // throw new ExceptionAddress('Address not found.');
    throw new ExceptionAddress('Address not found.',self::ADDRESS_ERROR_NOT_FOUND);
  }

  /**
   * Given an address_type_id, return an instance of that subclass
   * @param  int $address_type_id 
   * @param  array  $data            
   * @return Address subclass                  
   */
  final public static function getInstance($address_type_id, $data = array()){
    $class_name = 'Address'.self::$valid_address_types[$address_type_id];
    // var_dump($class_name);exit;
    return new $class_name($data);
  }

  /**
   * Save an Address
   */
  final public function save() {}
}