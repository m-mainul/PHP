  <?php require_once("../includes/session.php"); ?>
  <?php require_once("../includes/db_connection.php"); ?>
  <?php require_once("../includes/functions.php"); ?>
  <?php $layout_context = "admin"; ?>
  <?php include("../includes/layouts/header.php"); ?>
  <?php find_selected_page();?>

 <div id="main">
   <div id="navigation">
    <?php echo navigation($current_subject, $current_page); //here $current_subject or $current_page may be associative array or null.?>	
  </div>
  <div id="page">
    <?php echo message();?>
    <?php $errors = errors(); ?>
    <?php echo form_errors($errors); ?>
      
     <h2>Create Subject</h2>
     <form action="create_subject.php" method="post">
      <p>Menu name: 
        <input type="text" name="menu_name" value="" id="menu_name" />
      </p>
      <p>Position: 
        <select name="position">
        <?php
          $Subject_set = find_all_subjects(); 
          $Subject_count = mysqli_num_rows($Subject_set);
          for($count=1; $count <= ($Subject_count + 1); $count++) {
           echo "<option value=\"{$count}\">{$count}</option>";
          }
         ?>  
          
        </select>
      </p>
      <p>Visible: 
        <input type="radio" name="visible" value="0" /> No
        &nbsp;
        <input type="radio" name="visible" value="1" /> Yes
      </p>
      <input type="submit" name = "submit" value="Create Subject" />
     </form>
     <br />
     <a href="manage_content.php">Cancel</a>
  </div>
</div>

<?php include("../includes/layouts/footer.php") ?> 
