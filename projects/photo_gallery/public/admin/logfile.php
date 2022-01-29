<?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php error_reporting(0); ?>
<?php

  $logfile = SITE_ROOT.DS.'logs'.DS.'log.txt';
  
  if($_GET['clear'] == 'true') {
		// when clear is true 
    // then we decide put content nothing in log file
    // file_put_contents is short hand for writing in the file
    file_put_contents($logfile, '');
	  // Add the first log entry
	  // Overwrite again in the log file
    // Then adding first log entry say logs cleared
    log_action('Logs Cleared', "by User ID {$session->user_id}");
    // redirect to this same page so that the URL won't 
    // have "clear=true" anymore
    redirect_to('logfile.php');
  } 
?>

<?php include_layout_template('admin_header.php'); ?>

<a href="index.php">&laquo; Back</a><br />
<br />

<h2>Log File</h2>

<p><a href="logfile.php?clear=true">Clear log file</a><p>

<?php

  if( file_exists($logfile) && is_readable($logfile) && 
			$handle = fopen($logfile, 'r')) {  // read
    echo "<ul class=\"log-entries\">";
		while(!feof($handle)) {
      // fgets is best for reading line by line contents
			$entry = fgets($handle);
			if(trim($entry) != "") {
				echo "<li>{$entry}</li>";
			}
		}
		echo "</ul>";
    fclose($handle);
  } else {
    echo "Could not read from {$logfile}.";
  }

?>

<?php include_layout_template('admin_footer.php'); ?>
