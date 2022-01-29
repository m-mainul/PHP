<?php 
	
	function strip_zeros_from_date($marked_string=""){
		//remove the marked zeros
		$no_zeros = str_replace('*0', '', $marked_string);
		//remove any remaining marks
		$cleaned_string = str_replace('*', '', $no_zeros);
		return $cleaned_string;
	}

	function redirect_to($location = NULL){
		if($location != NULL){
			// echo header("Location: " . $location);
			header("Location: " . $location);
			exit;
		}
	}

	function output_message($message=""){
		if(!empty($message)){
			return "<p class=\"message\">{$message}</p>";
		} else {
			return "";
		}
	}

	// Autoload will take we don't define include the definition of class 
	// in a file which is required
	// It may be useful if we include the file in initialize.php
	function __autoload($class_name) {
		$class_name = strtolower($class_name);
		// $path = "../includes/{$class_name}.php";
		$path = LIB_PATH.DS."{$class_name}.php";
		if(file_exists($path)) {
			require_once($path);
		} else {
			die("The file {$class_name}.php could not be found.");
		}
	}

	// Helper method we write helper class for this such type of helper method.
	// Method will help us to avoid write same code again and again.
	function include_layout_template($template="") { 
		include(SITE_ROOT.DS.'public'.DS.'layouts'.DS.$template);
	}

	function log_action($action, $message="") {
		$logfile = SITE_ROOT.DS.'logs'.DS.'log.txt';
		$new = file_exists($logfile) ? false : true;

		// Write the file using append 
		// append a+ append the contents in the file or open a new one.
		if($handle = fopen($logfile, 'a')) { 
		  $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
		  $content = "{$timestamp} | {$action} : {$message}\n";
		  fwrite($handle, $content);
		  fclose($handle);
		  if($new) { chmod($logfile, 0755);}
		} else {
			echo "Could not open lof file for writing.";

		}
	}

	// Convert time into more nicer version.
	function datetime_to_text($datetime=""){
		$unixdatetime = strtotime($datetime);
		return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
	}

	//passwprd: GRANT ALL PRIVILEGES ON photo_gallery.* TO 'gallery'@'localhost' IDENTIFIED BY 'php0TL123';
?> 