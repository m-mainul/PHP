  <?php require_once("../includes/session.php"); ?>
  <?php require_once("../includes/db_connection.php"); ?>
  <?php require_once("../includes/functions.php"); ?>
  <?php require_once("../includes/validation_functions.php"); ?>
  
  <?php
  if(isset($_POST['submit'])){
        //Process the form


        //validations
    $required_fields = array("user_name","password");
    validate_presences($required_fields);

    $fields_with_max_lengths = array("user_name" => 30);
    validate_max_lengths($fields_with_max_lengths);

    if(empty($errors)){
          //Perform Create
      $user_name = mysql_prep($_POST["user_name"]);
      $hashed_password = password_encrypt($_POST["password"]);

      $query  = "INSERT INTO admins(";
        $query .= "username, hashed_password";
        $query .= ") VALUES (";
        $query .= " '{$user_name}', '{$hashed_password}'";
        $query .= ")";   
  $result = mysqli_query($connection, $query);

  if($result){
              //Success
    $_SESSION["message"] = "Admin created";
    redirect_to("manage_admins.php");
  } else {
    //Failure
    $_SESSION["message"] = "Admin creation failed.";
  }
 }
}
else {
}
?>


<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
 <div id="navigation"> 
 </div>
 <div id="page">
  <?php echo message();?>
  <?php echo form_errors($errors); ?>

  <h2>Create Admin</h2>
  <form action="new_admin.php" method="post">
    <p>Username: 
      <input type="text" name="user_name" value="" id="user_name" />
    </p> 
    <p>Password: 
      <input type="password" name="password" value="" id="password" />
    </p>
    <input type="submit" name = "submit" value="Create Admin" />
    <br>
  </form>
  <a href="manage_admins.php">Cancel</a>
</div>
</div>

<?php include("../includes/layouts/footer.php") ?> 
