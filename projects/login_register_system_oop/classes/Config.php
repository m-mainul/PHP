<?php 
 class Config {
 	public static function get($path = null) {
 		// We should whether path is passed in this method or not
 		if($path) {
 			// Primarily identify from where the path is coming
 			$config = $GLOBALS['config'];
 			// print_r($GLOBALS);
 			$path = explode('/', $path);

 			// var_dump($path);

 			foreach($path as $bit) {
 				// var_dump($path);
 				// echo '<br/>'; 
 				// var_dump($bit);
 				// echo $path, ' ', $bit;
 				// echo "<br />";
 				if(isset($config[$bit])){
 					$config = $config[$bit];
 					// echo "<br />";
 					// var_dump($config);

	 		  	}

	 		  	// echo '<hr/>';
 			}

 			return $config;
 			// print_r($path);
 		}

 		return false;
 	}
 }