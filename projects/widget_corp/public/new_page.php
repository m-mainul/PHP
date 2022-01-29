  <?php require_once("../includes/session.php"); ?>
  <?php require_once("../includes/db_connection.php"); ?>
  <?php require_once("../includes/functions.php"); ?>
  <?php require_once("../includes/validation_functions.php"); ?>
  
  <?php find_selected_page();?>

  <?php 
    //can't add a new page unless we hava a subject as a parent!
    if(!$current_subject) { //because i use subject id in the query string so we get 
      // subject ID was missing or invalid or
       //  subject couldn't be found in database
       redirect_to("manage_content.php");
    }
   ?>
  <!-- Start Form Processing
  only execute the form processing if the form has been submitted -->
  <?php
    if(isset($_POST['submit'])){
      // initialize an array to hold our errors
       // $errors = array();

      //validations
      // perform validations on the form data
      $required_fields = array("menu_name","position","visible","content");
      validate_presences($required_fields);

      $fields_with_max_lengths = array("menu_name" => 30);
      validate_max_lengths($fields_with_max_lengths);

      if(empty($errors)){
        // Perform Create

        // clean up the form data before putting it in the database
        // make sure add the subject_id!
        $subject_id =  $current_subject["id"];
        $menu_name = mysql_prep($_POST["menu_name"]);
        $position = (int) $_POST["position"];
        $visible = (int) $_POST["visible"];
        // be sure to escape the content
        $content = mysql_prep($_POST["content"]);


        $query  = "INSERT INTO pages (";
        $query .= "subject_id, menu_name, position, visible, content";
        $query .= ") VALUES (";
        $query .= " {$subject_id}, '{$menu_name}', {$position}, {$visible}, '{$content}'";
        $query .= ")";    
        $result = mysqli_query($connection, $query);
      
        if($result){
          //Success
          $_SESSION["message"] = "page created.";
          // redirect_to("manage_content.php?subject={$subject_id}");
          redirect_to("manage_content.php?subject=" . urlencode($current_subject["id"]));
          // redirect_to("manage_content.php?subject = {$subject_id}");//never use space between query string variable and = sign.
        } else {
        //Failure
        $_SESSION["message"] = "page creation failed.";
        // redirect_to("new_page.php");
      }
    }  
  }
   else {//else will execute if $_POST["submit"] is not submitted or submission is not proper submission.
      //This is probably a GET request
      // redirect_to("new_page.php"); This is not needed because redirection is occured in below.
    }//end: if (isset($_POST['submit']))
  
  
?>
<?php $layout_context = "admin"; ?>
 <?php include("../includes/layouts/header.php"); ?>
 <div id="main">
   <div id="navigation">
    <?php echo navigation($current_subject, $current_page); //here $current_subject or $current_page may be associative array or null.?>	
  </div>
  <div id="page">
    <?php echo message();?>
    <?php //$errors = errors(); ?>
    <?php echo form_errors($errors); ?>
      
     <h2>Create Page</h2>
     <form action="new_page.php?subject=<?php echo urlencode($current_subject["id"]); ?>" method="post">
      <p>Menu name: 
        <input type="text" name="menu_name" value="" id="menu_name" />
      </p>
      <p>Position: 
        <select name="position">
        <?php
          $page_set = find_pages_for_subject($current_subject["id"]); 
          $page_count = mysqli_num_rows($page_set);
          for($count=1; $count <= ($page_count + 1); $count++) {
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
      <p>Content:<br>
      <textarea rows="20" cols="80" name = "content">
      </textarea>
      </p> 
      <!-- <input type="hidden" name="subject_id" value="<?php echo $current_subject["id"]; ?>" /> -->
      <!-- We could pass subject in two ways: one is query string and another one is hidden here we choose query
      string for passing data. -->
      <input type="submit" name = "submit" value="Create Page" />
      <br>
     </form>
     <a href="manage_content.php?subject=<?php echo urlencode($current_subject["id"]);//little technique to back same subject page and activate the same subject contents ?>">Cancel</a>
     <!-- <a href="manage_content.php">Cancel</a> -->
  </div>
</div>

<?php include("../includes/layouts/footer.php") ?> 
