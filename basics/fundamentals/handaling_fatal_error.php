<?php 
	register_shutdown_function('shutdown_notify');
	// Send a notification on a shutdown caused by an error.
	function shutdown_notify() {
		$error = error_get_last();
	}
 ?>