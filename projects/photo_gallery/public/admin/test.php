<?php 
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) { redirect_to("login.php");}
?>

<?php include_layout_template('admin_header.php'); ?>

<?php 
	// Create new user
	// instantiate the User class
	$user = new User();
	// $user->username = "Mainul";
	// $user->password = "123";
	// $user->first_name = "Mainul";
	// $user->last_name = "Hasan";
	// Apply create method to create new user
	// $user->create();
	
	// Update a user information
	// $user = User::find_by_id(6);
	// $user->username = "mainul";
	// $user->password = "123";
	// $user->first_name = "Mainul";
	// $user->last_name = "Hasan";
	// $user->password = "789";
	// $user->update();
	// if($user->update()){
	// if($user->save()){
	// 	echo "Successfully Updated.";
	// } else {
	// 	echo "Not Updated";
	// }
	// $user->save();
	
	$user = User::find_by_id(6);
	$user->delete();
	echo $user->username." Was deleted.";
?>	

<?php include_layout_template('admin_footer.php'); ?>
