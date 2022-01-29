  <?php require_once("../includes/session.php"); ?>
  <?php require_once("../includes/db_connection.php"); ?>
  <?php require_once("../includes/functions.php"); ?>
  <?php require_once("../includes/validation_functions.php"); ?>

  <?php find_selected_page();?>

  <?php
    // Unlike new_page.php, we don't need a subject_id to be sent
   //  We already have it stored in pages.subject_id
    if(!$current_page){
      //page ID was missing or invalid or
      //page couldn't be found in database
      redirect_to("manage_content.php");
    } 
   ?>
 
 <?php
  if(isset($_POST['submit'])){
    //Process the form
    $id = $current_page["id"];
    $menu_name = mysql_prep($_POST["menu_name"]);
    $position = (int) $_POST["position"];
    // $visible = (int) $_POST["visible"];
    $content = mysql_prep($_POST["content"]);

    //validations
    $required_fields = array("menu_name","position","visible","content");
    validate_presences($required_fields);

    $fields_with_max_lengths = array("menu_name" => 30);
    validate_max_lengths($fields_with_max_lengths);

    if(empty($errors)){
      //perform update
    $query  = "UPDATE pages SET ";
    $query .= "menu_name = '{$menu_name}', "; 
    $query .= "position = {$position}, ";
    // $query .= "visible = {$visible}, ";
    $query .= "visible = {$_POST["visible"]}, ";
    $query .= "content = '{$content}' ";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1";//it is going to only one that is for safetyness    
    $result = mysqli_query($connection, $query);
    
    //if($result && mysqli_affected_rows($connection) == 1){ if we use this condition then data will not be updated when if don't change anything of the data.
    if($result && mysqli_affected_rows($connection) >= 0){ //This is more conveninent even is not changed then it will also allow to update the database.
      //Success
      $_SESSION["message"] = "Page updated";
      $page_id = $current_page["id"]; //pass id to the url for further use using query string
      redirect_to("manage_content.php?page={$page_id}");
    } else {
      //Failure
      $_SESSION["message"] = "Page update failed.";
    }
}
  } else {
    //This is probably a GET request
    
  }//end: if(isset($_POST['submit']))
  ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php") ?>

 <div id="main">
   <div id="navigation">
    <?php echo navigation($current_subject, $current_page); //here $current_subject or $current_page may be associative array or null.?>	
  </div>
  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
      
     <h2>Edit Page: <?php echo htmlentities($current_page["menu_name"]); ?></h2>
     <form action="edit_page.php?page=<?php echo urlencode($current_page["id"]);//track which subject will be updated. ?>" method="post">
      <p>Menu name: 
        <input type="text" name="menu_name" value="<?php echo htmlentities($current_page["menu_name"]); ?>" id="menu_name" />
      </p>
      <p>Position: 
        <select name="position">
        <?php
          // $page_set = find_pages_position_for_subject($current_subject["id"]); //here $current_subject not work because when we work with page $current_subject will null.
          $page_set = find_pages_for_subject($current_page["subject_id"]);
          $page_count = mysqli_num_rows($page_set);
          for($count=1; $count <= $page_count; $count++) {
           echo "<option value=\"{$count}\"";
           if($current_page["position"] == $count){
            echo " selected";
           }
           echo ">{$count}</option>";
          }
         ?>  
          
        </select>
      </p>
      <p>Visible: 
        <input type="radio" name="visible" value="0" <?php if($current_page["visible"] == 0){echo "checked";} ?>/> No
        &nbsp;
        <input type="radio" name="visible" value="1" <?php if($current_page["visible"] == 1){echo "checked";} ?> /> Yes
      </p>
      <!-- <p>Content: 
        <input type="text" name="content" value="<?php echo htmlentities($current_page["content"]); ?>" id="content" />
      </p> -->
      <p>Content:<br>
      <textarea rows="15" cols="80" name = "content">
        <?php echo htmlentities($current_page["content"]); ?>
      </textarea>
      </p> 
      <input type="submit" name = "submit" value="Edit page" />
     </form>
     <br />
     <a href="manage_content.php">Cancel</a>
     &nbsp;
     &nbsp;
     <a href="delete_page.php?page=<?php echo urlencode($current_page["id"]);//which page gone to be delete. ?>" onclick = "return confirm('Are you sure?');">Delete page</a>
  </div>
</div>

<?php include("../includes/layouts/footer.php") ?> 
