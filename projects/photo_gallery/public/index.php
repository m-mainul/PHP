<?php  ?>
<?php require_once("../includes/initialize.php"); ?>
<?php
	// Pagination Varialbes
  // 1. The current page number ($current_page)
  $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

  // 2. records per page ($per_page)
  $per_page = 3;

  // 3. total record count ($total_count)
  $total_count = Photograph::count_all();

  // Find all photos
	// calling static methods find_all()
  // return all of the photos
	// $photos = Photograph::find_all(); 
	// print_r($photos);

  $pagination = new Pagination($page, $per_page, $total_count);

  // Instead of finding all records, just find the records
  // for the current page
  $sql  = "SELECT * FROM photographs ";
  $sql .= "LIMIT {$per_page} ";
  $sql .= "OFFSET {$pagination->offset()}";
  $photos = Photograph::find_by_sql($sql);

  // Need to add?page=$page to all links we want to
  // maintain the current page (or store $page in $session)

?>
<?php include_layout_template('header.php'); ?>

<?php foreach ($photos as $photo): ?>
  <div style="float: left; margin-left: 20px;">
	<a href="photo.php?id=<?php echo $photo->id; ?>">
  	   <!-- here .. is not required in the source because images
  	   folder and index page in the same directory -->
  	   <!-- The smaller version of the image shown in the photo list
  	   If we want to larger version then we need create another 
  	   file in our project this file is photo.php -->
  	   <img src="<?php echo $photo->image_path(); ?>" width="200" />
	</a>
  	<p><?php echo $photo->caption; ?> </p>
  </div>
<?php endforeach; ?>

<div id="pagination" style="clear:both;">
  <?php
    if($pagination->total_pages() > 1) {

      if($pagination->has_previous_page()) {
        echo " <a href=\"index.php?page=";
        echo $pagination->previous_page();
        echo "\">&laquo; Previous</a> ";
      }

      for($i=1; $i <= $pagination->total_pages(); $i++) {
        if($i == $page) {
          echo " <span class=\"selected\">{$i}</span> ";
        } else {
          echo " <a href=\"index.php?page={$i}\">{$i}</a> ";
        }
      }

      if($pagination->has_next_page()) {
        echo " <a href=\"index.php?page=";
        echo $pagination->next_page();
        echo "\">Next &raquo;</a> ";
      }

    }
  ?>
</div>

<?php include_layout_template('footer.php'); ?>




<?php 
// require_once("../includes/functions.php");
// require_once("../includes/database.php");
// require_once("../includes/user.php");

// require_once("../includes/initialize.php");



// $sql  = "INSERT INTO users (id, username, password, first_name, last_name) ";
// $sql .= "VALUES (3,'sabbir','hasan','Mahmudul','Hasan')";
// $result = $database->query($sql);

// echo "<hr />";
// $user = User::find_by_id(1);
// // echo "<pre>";
// // print_r($user);
// // echo "</pre>";
// // exit;
// // echo $user->full_name();

// echo "<hr />";

// $users = User::find_all();
// // echo "<pre>";
// // print_r($users);
// // echo "</pre>";
// // exit;
// foreach ($users as $user) {
// 	echo "User: ". $user->username ."<br />";
// 	echo "Name: ". $user->full_name() ."<br /><br />";
// }
// // $user_set = User::find_all();
// // while($user = $database->fetch_array($user_set)){
// // 	echo "User: " . $user['username'] ."<br />";
// // Instead of clumsy like below we can write method full_name based on attribute of class 
	// And the attribute feeding from database object	
	// echo "Name: " . $user['first_name'] . " " .$user['last_name']."<br /><br />";
// // }

// // $User = new User();
// // $found_user = $User->find_all();
//  //echo $found_user["username"];
?>