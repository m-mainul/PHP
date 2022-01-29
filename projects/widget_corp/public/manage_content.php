  <?php require_once("../includes/session.php"); ?>
  <?php require_once("../includes/db_connection.php"); ?>
  <?php require_once("../includes/functions.php"); ?>
  <?php $layout_context = "admin"; ?>
  <?php include("../includes/layouts/header.php"); ?>
  <?php find_selected_page();?>


  <?php 
    #just remainder
    //When $current_subject or $current_page is null then only show the navigation bar.
   ?>

 <div id="main">
   <div id="navigation">
   <br>
   <a href="admin.php">&laquo; Main menu</a><br> <!-- This will give &laquo; << in output -->
    <?php echo navigation($current_subject, $current_page); //here $current_subject or $current_page may be associative array or null.?>	
  <br>
  <a href="new_subject.php">+ Add a subject</a>
  </div>
  <div id="page">
    <?php echo message();?>  
    <?php if($current_subject){ ?>
     <h2>Manage Subject</h2>
     <!-- Here menu name is coming from the database trusted string is something admin created
     We'll not worried about hacker's not give that value.
     However anything anytime in html we need to concern even its trusted value.
     An admin very innocently uses special characters that will cause for problem for html
     So we should encoding in html.
     We will always use htmlspecialchars() or htmlentities() -->
      Menu name: <?php echo htmlentities($current_subject["menu_name"]); ?><br>
      Position: <?php echo $current_subject["position"]; ?><br>
      <!-- Visible will be 0 or one it will better to show yes or no -->
      Visible: <?php echo $current_subject["visible"]==1?'yes':'no'; ?><br>
      <br>
      <a href="edit_subject.php?subject=<?php echo urldecode($current_subject["id"]);?>">Edit Subject</a>
      
      <div style="margin-top: 2em; border-top: 1px solid #000000">
      <!-- Following code for show related page of a subject. -->
      <h2>Pages in this subject:</h2>
      <!-- My Code -->
      <!-- <?php $page_set = find_pages_for_subject($current_subject["id"]); 
            echo "<ul>";
            while($page = mysqli_fetch_assoc($page_set)){ 
              echo "<li>";
              echo "<a href=\"\">";
              echo htmlentities($page["menu_name"]);
              echo "</a>";
              echo "</li>";
            }
            echo "</ul>";
            mysqli_free_result($page_set); 
      ?>  -->

      <?php $subject_pages = find_pages_for_subject($current_subject["id"]); 
            echo "<ul>";
            while($page = mysqli_fetch_assoc($subject_pages)){ 
              echo "<li>";
              $safe_page_id = urlencode($page["id"]);
              echo "<a href=\"manage_content.php?page={$safe_page_id}\">";
              echo htmlentities($page["menu_name"]);
              echo "</a>";
              echo "</li>";
            }
            echo "</ul>";
            mysqli_free_result($subject_pages); 
      ?>       
      <br>
      + <a href="new_page.php?subject=<?php echo urlencode($current_subject["id"]); //pass subject id to the new page for getting id in the new page for further use.?>">Add a new page to this subject</a>
    </div> 
    <?php } elseif($current_page){ ?>
     <h2>Manage Page</h2>
      Menu name: <?php echo htmlentities($current_page["menu_name"]); ?><br>
      Position: <?php echo $current_page["position"]; ?><br>
      Visible: <?php echo $current_page["visible"]==1?'yes':'no'; ?><br>
      Content: <br>
      <div class="view-content">
        <!-- Always careful when anything in html shoule be use htmlentities() or htmlspecialchars() -->
        <?php echo htmlentities($current_page["content"]); ?>
      </div>

      <br>
      <br>

      <a href="edit_page.php?page=<?php echo urlencode($current_page["id"]); ?>">Edit Page</a>
      
    <?php } else { ?>
      please select a subject or a page.
    <?php } ?> 
  </div>
</div>

<?php include("../includes/layouts/footer.php") ?> 
