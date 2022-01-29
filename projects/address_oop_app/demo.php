<?php

// Define autoloder.
function __autoload($class_name) {
	include $class_name.'.php';
}
// require_once 'address.php';
// require_once 'database.php';

echo '<h2>Instantiating AddressResidence</h2>';
$address_residence = new AddressResidence();

// echo '<h2>Empty Address</h2>';
// echo '<tt><pre>' . var_export($address, TRUE) . '</pre></tt>';

echo '<h2>Setting properties...</h2>';
$address_residence->street_address_1 = '555 Fake Street';
$address_residence->city_name = 'Townsville';
$address_residence->subdivision_name = 'State';
// $address->postal_code = '12345';
$address_residence->country_name = 'United States of America';
// $address_residence->address_type_id = 1;
echo $address_residence;
echo '<tt><pre>'.var_export($address_residence,TRUE).'</pre></tt>';
// echo '<h2>Instantiating Address</h2>';
// $address = new Address;

// // echo '<h2>Empty Address</h2>';
// // echo '<tt><pre>' . var_export($address, TRUE) . '</pre></tt>';

// echo '<h2>Setting properties...</h2>';
// $address->street_address_1 = '555 Fake Street';
// $address->city_name = 'Townsville';
// $address->subdivision_name = 'State';
// // $address->postal_code = '12345';
// $address->country_name = 'United States of America';
// $address->address_type_id = 1;
// echo $address;

// echo '<tt><pre>' . var_export($address, TRUE) . '</pre></tt>';

// echo '<h2>Displaying address...</h2>';
// echo $address->display();

// echo '<h2>Testing magic __get and __set</h2>';
// unset($address->postal_code);
// echo $address->postal_code = '2564';
// echo $address->display();
// Now create a new address object with an array of properties and values.
echo '<h2>Testing Address __construct with an array</h2>';
// address object this time with an array is as a property
$address_business = new AddressBusiness(array(
	'street_address_1' => '123 Phony Ave',
	'city_name' => 'Villageland',
	'subdivision_name'=>'Region',
	// 'postal_code'=>'67890',
	'country_name'=>'Canada',
	'time_created'=>'123156'
	));
echo $address_business;
echo '<tt><pre>'.var_export($address_business,TRUE).'</pre></tt>';

echo '<h2>Instantiating AddressPark</h2>';
$address_park = new AddressPark(array(
	'street_address_1' => '789 Missing Circle',
	'street_address_2' => 'Suite 0',
	'city_name'		   => 'Hamlet',
	'subdivision_name' => 'Territory',
	'country_name'	   => 'Australia'
	));
echo $address_park;
echo '<tt><pre>'.var_export($address_park,TRUE).'</pre></tt>';

echo '<h2>Cloning AddressPark</h2>';
$address_park_clone = clone $address_park;
echo '<tt><pre>'.var_export($address_park,TRUE).'</pre></tt>';
echo $address_park;
echo '<tt><pre>'.var_export($address_park,TRUE).'</pre></tt>';

echo '<h2>Cloning AddressPark</h2>';
$address_park_clone = clone $address_park;
echo '<tt><pre>'.var_export($address_park_clone, TRUE).'</pre></tt>';
echo '$address_park_clone is '.($address_park==$address_park_clone ? '':' not').' a copy of address_park.';

echo '<h2>Copying AddressBusiness reference</h2>';
$address_business_copy =& $address_business;
// $address_business_copy = $address_business;
echo '$address_business_copy is '.($address_business === $address_business_copy ? '':'not ').' a copy of $address_business';

echo '<h2>Setting address business copy as a new AddressPark</h2>';
$address_business = new AddressPark();
echo '$address_business_copy is '.($address_business === $address_business_copy ? '':'not').' a copy of $address_business.';
echo '<br/>$address_business is class '.get_class($address_business).'.';
echo '<br/>$address_business_copy is '.($address_business_copy instanceof AddressBusiness ? '':'not').' an AddressBusiness.';

echo '<h2>Testing typecasting to an object</h2>';
$test_object = (object) array(
	'hello'  => 'world',
	'nested' => array('key' => 'value')
	);
echo '<tt><pre>'.var_export($test_object,TRUE).'</pre></tt>';

echo '<h2>Testing typecasting to an object witho only value not array</h2>';
$test_object = (object) 123456;
echo '<tt><pre>'.var_export($test_object,TRUE).'</pre></tt>';

echo '<h2>Loading from database</h2>';
try {
	$address_db = Address::load(0);
	echo '<tt><pre>'.var_export($address_db,TRUE).'</pre></tt>';
}
// Once caught, we can optionally take further action.
// In this case, rendering the message that was included in the thrown exception is sufficient.
catch(ExceptionAddress $e) {
	echo $e;
}


// echo '<tt><pre>' . var_export($address_2, TRUE) . '</pre></tt>';
// echo $address_2->display();

// echo '<h2>Address __toString</h2>';
// echo $address_2;

// echo '<h2>Displaying address types..</h2>';
// echo '<tt><pre>' . var_export(Address::$valid_address_types, TRUE) . '</pre></tt>';

// echo '<h2>Testing address type ID validation</h2>';
// for ($id = 0; $id <= 4; $id++) {
//   echo "<div>$id: ";
//   echo Address::isValidAddressTypeId($id) ? 'Valid' : 'Invalid';
//   echo "</div>";
// }


