<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php
    if(isset($_POST['submit'])){
      //Process the form
      $user_name = mysql_prep($_POST["user_name"]);
      $password = mysql_prep($_POST["password"]);

      //validations
      $required_fields = array("user_name");
      validate_presences($required_fields);

      $fields_with_max_lengths = array("user_name" => 30);
      validate_max_lengths($fields_with_max_lengths);

      if(!empty($errors)){
        $_SESSION["errors"] = $errors;
        redirect_to("new_admin.php");
      }

      $query  = "INSERT INTO admins(";
      $query .= "username, hashed_password";
      $query .= ") VALUES (";
      $query .= " '{$user_name}', '{$password}'";
      $query .= ")";    
      $result = mysqli_query($connection, $query);
      //echo $query; exit;
      if($result){
        //Success
        $_SESSION["message"] = "Admin created";
        redirect_to("manage_admins.php");
      } else {
        //Failure
        $_SESSION["message"] = "Admin creation failed.";
        redirect_to("new_admin.php");
      }

    } else {
      //This is probably a GET request
      redirect_to("manage_admins.php");
    }
?>

<?php if (isset($connection)) { mysqli_close($connection); }?> 
